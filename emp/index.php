<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $query=mysqli_query($con,"select ID from employeedetail where  EmpEmail='$Email' && EmpPassword='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['uid']=$ret['ID'];
     header('location:welcome.php');
    }
    else{
      $msg="Invalid Details.";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <title>User Login</title>
  <link rel="stylesheet" href="..\css\style-login-reg.css">

</head>
<body>
  <div>
    <div class="login-container">
      <h2>تسجيل الدخول</h2>
      <h6>user login</h6>
      <p style="font-size:16px; color:red; text-align:center"> <?php if ($msg="Invalid Details") {
        echo $msg;
      } ?> </p>
      <form class="user" method="post" action="">
        <div class="form-group">
          <label for="username">البريد الإلكتروني</label>
          <input type="email" class="form-control form-control-user" id="Email" name="Email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true">

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
         
                  <div class="text-center">
                    <a class="small" href="registeruser.php">Create an Account!</a>
                  </div>
    </div>
    <div>
      <footer> <small>Copyright ©2024 All rights reserved for <strong>Abdulsattar Alshiekh Ahmad</strong></small>
      </footer>
    </div>
  </div>
</body>
</html>
