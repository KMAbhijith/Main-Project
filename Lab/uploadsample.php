<?php

include "connect.php";

$lba = $_GET['lba'];
if (mysqli_query($con, "UPDATE labrefassign SET `LA_resultstatus`=1 WHERE LA_id=$lba")) {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="index.php"</script>');
    } else {
        header("location:index.php");
        die();
    }
}
