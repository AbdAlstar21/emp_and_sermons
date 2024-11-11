<?php
include('../includes/dbconnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {

  $FName = $_POST['FirstName'];
  $LName = $_POST['LastName'];
  $empcode = $_POST['empcode'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  $stmt = $con->prepare("SELECT EmpEmail FROM employeedetail WHERE EmpEmail = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $msg = "هذا الحساب موجود بالفعل";
} else {
    $stmt = $con->prepare("INSERT INTO employeedetail (EmpFname, EmpLName, EmpCode, EmpEmail, EmpPassword) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $FName, $LName, $empcode, $Email, $Password);
    if ($stmt->execute()) {
        $msg = "نجحت عملية التسجيل";
    } else {
        $msg = "فشلت عملية التسجيل";
    }
}
  }


?>



<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>تسجيل حساب</title>
  <link rel="stylesheet" href="..\css\style-login-reg.css">



</head>

<body>

  <div>
    <div class="login-container">
      <h2>تسجيل المستخدم</h2>
      <h6>user signup</h6>
      <p style="font-size:16px; color:green; text-align:center"> <?php if ($msg) {
        echo $msg;
      } ?> </p>
      <form class="user" method="post" action="">
        <div class="form-group">
          <label for="FirstName">الاسم</label>
          <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName"
            placeholder="First Name" required="true">
        </div>
        <div class="form-group">
          <label for="LastName">الكنية</label>
          <input type="text" class="form-control form-control-user" id="LastName" name="LastName"
            placeholder="Last Name" required="true">
        </div>
        <div class="form-group">
          <label for="empcode">الرقم الذاتي</label>

          <input type="text" class="form-control form-control-user" id="empcode" name="empcode"
            placeholder="Enter your Employee Code" required="true">
        </div>

        <div class="form-group">
          <label for="Email">البريد الإلكتروني</label>
          <input type="email" class="form-control form-control-user" id="Email" name="Email" placeholder="Email Address"
            required="true">
        </div>

        <div class="form-group">
          <label for="Password">كلمة المرور</label>
          <input type="password" class="form-control form-control-user" id="Password" name="Password"
            placeholder="Password" required="true">
        </div>

        <div class="col-sm-6">
          <label for="RepeatPassword">تأكيد كلمة المرور</label>
          <input type="password" class="form-control form-control-user" id="RepeatPassword" name="RepeatPassword"
            placeholder="Repeat Password" required="true">
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">تسجيل الحساب</button>
        <hr>
      </form>
      <hr>
      <div class="text-center">
        <a class="small" href="loginuser.php">Already have an account? Login!</a>
      </div>
    </div>
    <div>
      <footer> <small>Copyright ©2024 All rights reserved for <strong>Abdulsattar Alshiekh Ahmad</strong></small>
      </footer>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>