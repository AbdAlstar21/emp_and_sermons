<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

// تحقق من تسجيل الدخول
if (empty($_SESSION['aid'])) {
  header('location:logout.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>تفاصيل الخُطب</title>
  <!-- إضافة الخطوط المخصصة -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,600,700" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/style-table.css" rel="stylesheet">

</head>
<body id="page-top">
  <div id="wrapper">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once('includes/header.php'); ?>
        <div class="container-fluid">
          <h1 style="text-align: center;" class="h3 mb-4 text-gray-800">الخُطب</h1>

          <?php if (isset($_SESSION['msg'])): ?>
            <p style="font-size:16px; color:red" align="center"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
          <?php endif; ?>

          <div class="table-responsive">
            <table style="direction:rtl; text-align:right; background-color:aliceblue;" class="table table-bordered" id="dataTable"  cellspacing="0">
              <tr style="color:cornflowerblue; background-color:antiquewhite; text-align: center">
                <th>م</th>
                <th>الخُطبة</th>
                <th>تاريخ الإضافة</th>
                <th>العمليات</th>
              </tr>

              <?php
              $result = mysqli_query($con, "SELECT * FROM sermon");
              $cnt = 1;
              while ($row = mysqli_fetch_assoc($result)):
              ?>
                <tr>
                  <td><?php echo $cnt++; ?></td>
                  <td >
                    <table>
                      <tr style="color:cornflowerblue; background-color:antiquewhite; text-align: center;">
                        <th><?php echo htmlspecialchars($row['title']); ?></th>
                      </tr>
                      <tr style="color:darkslategrey; background-color:lightsteelblue;">
                        <td><?php echo nl2br(htmlspecialchars($row['sermon'])); ?></td>
                      </tr>
                    </table>
                  </td>
                  <td><?php echo htmlspecialchars($row['sermonRegdate']); ?></td>
                  <td>
                    <a href="editsermon.php?editid=<?php echo $row['ID']; ?>">تعديل الخُطبة</a> |
                    <a href="deletesermon.php?editid=<?php echo $row['ID']; ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>
