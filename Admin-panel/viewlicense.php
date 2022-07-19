<?php
include('connect.php');
$la = $_GET['did'];

$c = mysqli_query($con, "select * from doctor where D_id=$la");
$d = mysqli_fetch_assoc($c);
$filename = "../doctor/doctorlic/" . $d['D_license'];


header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));


readfile($filename);
