<?php
session_start();
include('../includes/dbconnection.php');
if (isset($_POST['login'])) {
  $uname = $_POST['username'];
  $Password = $_POST['Password'];
  $query = mysqli_query($con, "select ID from tbladmin where  AdminuserName='$uname' && Password='$Password' ");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    $_SESSION['aid'] = $ret['ID'];
    header(header: 'location:welcome.php');
  } else {
    $msg = "Invalid Details";
  }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <title>Login admin</title>
  <link rel="stylesheet" href="..\css\style-login-reg.css">
</head>

<body>
  <div>
    <div class="login-container">
      <h2>تسجيل الدخول</h2>
      <h6>admin login</h6>
      <p style="font-size:16px; color:red; text-align:center"> <?php if ($msg="Invalid Details") {
        echo $msg;
      } ?> </p>
      <form class="user" method="post" action="">
        <div class="form-group">
          <label for="username">الرقم الذاتي</label>
          <input type="test" class="form-control form-control-user" id="username" name="username"
            aria-describedby="emailHelp" required="true" placeholder="Enter username ...">
        </div>
        <div class="form-group">
          <label for="Password">كلمة المرور</label>
          <input type="password" class="form-control form-control-user" id="Password" name="Password"
            placeholder="Password" required="true">
        </div>
        <button type="submit" name="login" value="login">تسجيل الدخول</button>
        <hr>
      </form>
      <hr>
    </div>
    <div>
      <footer> <small>Copyright ©2024 All rights reserved for <strong>Abdulsattar Alshiekh Ahmad</strong></small>
      </footer>
    </div>
  </div>

</body>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

</body>

</html>