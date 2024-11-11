<?php
include('../includes/dbconnection.php');

     $sid=$_GET['editid'];
  $query=mysqli_query($con, query: "delete from sermon where ID='$sid'");
     if ($query) {
      echo "<script>alert('تم حذف الخُطبة بنجاح');</script>";
      echo "<script>window.location.href='allsermon.php';</script>";

    // echo "تم الحذف بنجاح";
   }
   else
     {
      echo "<script>alert('حدث خطأ أثناء حذف الخُطبة');</script>";
      echo "<script>window.location.href='allsermon.php';</script>";
     }
     header('Location: allsermon.php');
?>
