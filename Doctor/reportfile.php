<?php
include('connect.php');
$mid = $_GET['mhid'];
$pid = $_GET['pid'];
$c = mysqli_query($con, "select * from medicalhistory where P_id='$pid' and MedHis_id='$mid'");
$d = mysqli_fetch_assoc($c);
$filename = "../user/Dashboard/html/doc/" . $d['MedHis_Report'];


header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));


readfile($filename);
