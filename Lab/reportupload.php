<?php

session_start();
include "connect.php";

if (isset($_SESSION['lab'])) {
?>

<?php
    if (isset($_POST['labref'])) {
        $la = $_POST['la'];
        $filename = $_FILES["pdfdo"]["name"];
        $tempname = $_FILES["pdfdo"]["tmp_name"];
        $folder = "img/" . $filename;
        if (mysqli_query($con, "insert into labresult (LR_file,LA_id) values('$filename','$la')")) {
            mysqli_query($con, "update labrefassign set LA_resultstatus='2' where LA_id=$la");
            move_uploaded_file($tempname, $folder);
            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="index.php"</script>');
            } else {
                header("location:index.php");
                die();
            }
        }
    }
?>
<?php
    if (isset($_POST['hpack'])) {
        $hpb = $_POST['hpb'];
        $filename = $_FILES["pdfdoc"]["name"];
        $tempname = $_FILES["pdfdoc"]["tmp_name"];
        $folder = "img/" . $filename;
        if (mysqli_query($con, "insert into hpack_report (HR_file,HPB_id) values('$filename','$hpb')")) {
            mysqli_query($con, "update hpack_book set status='2' where HPB_id=$hpb");
            move_uploaded_file($tempname, $folder);
            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="sample.php"</script>');
            } else {
                header("location:sample.php");
                die();
            }
        }
    }
?>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}


?>