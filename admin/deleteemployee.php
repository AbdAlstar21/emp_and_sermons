<?php
session_start();
include('../includes/dbconnection.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['delid'])) {
        $id = $_GET['delid'];

        // بناء الاستعلام لحذف الموظف
        $query = "DELETE FROM employeedetail WHERE ID='$id'";
        
        // تنفيذ الاستعلام
        if (mysqli_query($con, $query)) {
            $msg = "تم حذف الموظف بنجاح.";
        } else {
            $msg = "حدث خطأ أثناء الحذف. يرجى المحاولة مرة أخرى.";
        }
    }
    // إعادة توجيه المستخدم إلى الصفحة السابقة
    header("location: allemployees.php?msg=" . urlencode($msg));
}
?>
