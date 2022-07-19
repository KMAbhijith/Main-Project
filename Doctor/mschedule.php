<?php
include "connect.php";
if (isset($_POST["submit"])) {
    $week = $_POST["wdate"];
    $stime = $_POST["starting"];
    $etime = $_POST["ending"];
    $doc = $_POST["did"];
    $sql2 = "select * from mschedule where MS_date=$week and D_id=$doc  ";
    $result = mysqli_query($con, $sql2);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $updatet = "update  mschedule set  S_Time ='$stime' , E_time='$etime'  where MS_date=$week and D_id=$doc";
        if (mysqli_query($con, $updatet)) {
            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
?>
        <?php
    } else {
        $sql = "insert into mschedule(S_Time,E_time,MS_date,D_id)values('$stime','$etime','$week','$doc')";
        if (mysqli_query($con, $sql)) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
    }
}


        ?>