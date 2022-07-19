<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {
?>
<?php
    include "connect.php";

    $hpid = $_GET['hpid'];
    $pid = $_GET['pid'];

    $chk = mysqli_query($con, "select * from healthpackage  where HP_patientno>0 and HP_id=$hpid ");
    $count = mysqli_fetch_assoc($chk);
    if (mysqli_num_rows($chk) > 0) {
        if (mysqli_query($con, "insert into hpack_book (HP_id,P_id,status)values('$hpid','$pid','0')")) {
            $upd = $count['HP_patientno'] - 1;
            mysqli_query($con, "update healthpackage set HP_patientno=$upd where HP_id=$hpid  ");
            echo '<script>alert("Booked succesfully");</script>';
            header("location:../Dashboard/html/index.php?e=1");
        } else {


            header("location:blog.php?d=1");
        }
    }
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../../login.php?e=1"</script>');
    } else {
        header("location:../../login.php?e=1");
        die();
    }
}
