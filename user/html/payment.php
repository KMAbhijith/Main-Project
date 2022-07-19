<?php

include("connect.php");


$sid = $_POST['sid'];
$pid = $_POST['pid'];
$did = $_POST['did'];
$token = mysqli_query($con, "select * from booking where S_id=$sid");
$countbk = mysqli_num_rows($token);
$tokenno = $countbk + 1;
$p = mysqli_query($con, "select * from schedule where S_id=$sid ");
$count = mysqli_fetch_assoc($p);
$select = mysqli_query($con, "select * from booking where S_id=$sid and P_id=$pid and D_id=$did");
if (mysqli_num_rows($select) < 1) {
    $query = "insert into booking (P_id,S_id,D_id,tokenno) values ('$pid','$sid','$did',$tokenno)";
    if (mysqli_query($con, $query)) {
        $up = $count['S_sltno'];
        $upd = $up - 1;
        mysqli_query($con, "update schedule set S_sltno=$upd where S_id=$sid");

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="../Dashboard/html/index.php?e=1"</script>');
        } else {
            header("location:../Dashboard/html/index.php?e=1");
            die();
        }
    }
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../Dashboard/html/index.php?e=1"</script>');
    } else {
        header("location:../Dashboard/html/index.php?e=1");
        die();
    }
}
