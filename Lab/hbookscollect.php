<?php

include "connect.php";

$lba = $_GET['hpb'];
if (mysqli_query($con, "UPDATE hpack_book SET `status`=1 WHERE HPB_id=$lba")) {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="index.php"</script>');
    } else {
        header("location:hpacksample.php");
        die();
    }
}
