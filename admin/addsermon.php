<?php
include('../includes/dbconnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $sermon = $_POST['sermon'];

  $ret = mysqli_query($con, "select sermon from sermon where title=''");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    $msg = "This title is null";
  } else {
  $query = mysqli_query($con, "insert into sermon(title, sermon) value('$title','$sermon')");
    if ($query) {
      $msg = "You have successfully added";
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
  }}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="">
  <meta name="author" content=""> -->
  <title>Sermon</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="text-align: right;" id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php') ?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php include_once('includes/header.php') ?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h2 mb-4 text-gray-600">إضافة خُطبة</h1>
          <p style="font-size:16px; color:red" align="center">  <?php  if($msg){ echo $msg;}  ?> </p>


          <form style="margin-left: 10% ; margin-left:10%;" class="user" name="register" method="post" onsubmit="return checkpass();">
            <div class="row">
              <div class="col-10 mb-3"> 
                <input   style="text-align: right;
            direction: rtl;"  placeholder="عنوان الخُطبة" type="text"
                  class="form-control form-control-user" id="title" name="title" aria-describedby="emailHelp"
                  required="true"></div>
              <!-- <div style="margin-top: 10px;" class="col-3 mb-4">
                <h5>عنوان الخطبة</h5>
              </div> -->
            </div>
          
            <div class="row">
              <div class="col-10 mb-3"> 
                <textarea 
                style="height: 380px;text-align: right;
            direction: rtl;"
                placeholder="الخُطبة" type="text"
                  class="form-control " id="sermon" name="sermon" aria-describedby="emailHelp"
                  required="true"></textarea>
              </div>
              <!-- <div style="margin-top: 10px;" class="col-3 mb-4">
                <h5>اسم المشرف</h5>
              </div> -->
            </div>
              
              <div class="row" style="margin-top:4%; margin-left:-10%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="إضافة" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>


          </form>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php include_once('../includes/footer.php'); ?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- <script type="text/javascript">

    $(".jDate").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    }).datepicker("update", "10/10/2016"); 
  </script> -->
</body>

</html>