<?php
include('connect.php');
$la = $_GET['la'];

$c = mysqli_query($con, "select * from labresult where LA_id=$la");
$d = mysqli_fetch_assoc($c);
$filename = "../Lab/img/" . $d['LR_file'];


header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));


readfile($filename);
