<?php
include "connect.php";
if (isset($_POST["submit"])) {
    $week = $_POST["wid"];
    $stime = $_POST["starting"];
    $etime = $_POST["ending"];
    $mno = $_POST["mno"];
    $doc = $_POST["did"];

    $sql = "insert into schedule(S_Time,E_time,W_day,D_id,S_sltno)values('$stime','$etime','$week','$doc','$mno')";
    if (mysqli_query($con, $sql)) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
        } else {
            header("location:manage.php?e=1");
            die();
        }
    }
}
