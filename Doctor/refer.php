<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/m/d h:i:s a', time());
    $dept = $_POST['dept'];
    $doc = $_POST['spec'];
    $remark = $_POST['remark'];
    $bookid = $_POST['bookid'];
    $sql = "insert into referal(Dept_id,D_id,remarks,B_id,date) values('$dept','$doc','$remark','$bookid','$date')";
    if ($con->query($sql)) {
        header("location:appoint.php");
    } else {
        echo "Added Failed!!!";
    }
}
