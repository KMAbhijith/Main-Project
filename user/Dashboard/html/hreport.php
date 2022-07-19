<?php
include('connect.php');
$la = $_GET['hpb'];

$c = mysqli_query($con, "select * from hpack_report where HPB_id=$la");
$d = mysqli_fetch_assoc($c);
$filename = "../../../Lab/img/" . $d['HR_file'];


header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));


readfile($filename);
