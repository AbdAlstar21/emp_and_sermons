<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if (strlen($_SESSION['aid']) == 0) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_SESSION['uid'];
    
    // تخزين بيانات الموظفين في مصفوفات
    $employees = [
      [
        'name' => $_POST['emp1name'],
        'designation' => $_POST['emp1des'],
        'ctc' => $_POST['emp1ctc'],
        'workduration' => $_POST['emp1workduration']
      ],
      [
        'name' => $_POST['emp2name'],
        'designation' => $_POST['emp2des'],
        'ctc' => $_POST['emp2ctc'],
        'workduration' => $_POST['emp2workduration']
      ],
      [
        'name' => $_POST['emp3name'],
        'designation' => $_POST['emp3des'],
        'ctc' => $_POST['emp3ctc'],
        'workduration' => $_POST['emp3workduration']
      ]
    ];

    // بناء الاستعلام بناءً على المصفوفات
    $query = "INSERT INTO empexpireince (EmpID, Employer1Name, Employer1Designation, Employer1CTC, Employer1WorkDuration, Employer2Name, Employer2Designation, Employer2CTC, Employer2WorkDuration, Employer3Name, Employer3Designation, Employer3CTC, Employer3WorkDuration)
              VALUES ('$eid', '{$employees[0]['name']}', '{$employees[0]['designation']}', '{$employees[0]['ctc']}', '{$employees[0]['workduration']}', 
                      '{$employees[1]['name']}', '{$employees[1]['designation']}', '{$employees[1]['ctc']}', '{$employees[1]['workduration']}', 
                      '{$employees[2]['name']}', '{$employees[2]['designation']}', '{$employees[2]['ctc']}', '{$employees[2]['workduration']}')";
    
    // تنفيذ الاستعلام
    if (mysqli_query($con, $query)) {
      $msg = "Your Experience data has been submitted successfully.";
    } else {
      $msg = "Something went wrong. Please try again.";
    }
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
  <title>Employees Details</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
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
          <h1 style="text-align: center;" class="h3 mb-4 text-gray-800">معلومات العاملين</h1>
          <p style="font-size:16px; color:red" align="center"><?php if ($msg) echo $msg; ?></p>
          <div class="table-responsive">
            <table style="direction:rtl" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>م</th>
                  <th>الرقم الذاتي</th>
                  <th>الاسم</th>
                  <th>الكنية</th>
                  <th>الإيميل</th>
                  <th>رقم الجوال</th>
                  <th>تاريخ الإنضمام</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM employeedetail");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo $row['EmpCode']; ?></td>
                    <td><?php echo $row['EmpFname']; ?></td>
                    <td><?php echo $row['EmpLName']; ?></td>
                    <td><?php echo $row['EmpEmail']; ?></td>
                    <td><?php echo $row['EmpContactNo']; ?></td>
                    <td><?php echo $row['EmpJoingdate']; ?></td>
                    <td><a href="editempprofile.php?editid=<?php echo $row['ID']; ?>">تعديل</a> | 
                    <a href="deleteemployee.php?delid=<?php echo $row['ID']; ?>"onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                    </tr>
                <?php } ?>
              </tbody>
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

<?php } ?>
