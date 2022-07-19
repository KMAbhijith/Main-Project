<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/m/d h:i:s a', time());
    $title = $_POST['title'];
    $disc = $_POST['dremark'];
    $prec = $_POST['remarks'];
    $bookid = $_POST['bookid'];
    $sql = "insert into medrecord(title,discription,precuation,B_id,Date) values('$title','$disc','$prec','$bookid','$date') ";

    if ($con->query($sql)) {
        header("location:appoint.php");
    } else {
        echo "Added Failed!!!";
    }
}
