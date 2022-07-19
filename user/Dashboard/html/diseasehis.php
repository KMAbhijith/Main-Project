<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    $sql = "insert into disease_his(Disease,P_id) values ";
    $rows = [];
    for ($i = 0; $i < count($_POST["ds"]); $i++) {
        $rows[] = "('{$_POST["ds"][$i]}','{$_POST["pid"]}')";
    }
    $sql .= implode(",", $rows);
    if ($con->query($sql)) {
        header("location:table-basic.php");
    } else {
        echo "Added Failed!!!";
    }
}

if (isset($_POST["add"])) {
    $sql = "insert into family_disease(FD_disease,P_id) values ";
    $rows = [];
    for ($i = 0; $i < count($_POST["ds1"]); $i++) {
        $rows[] = "('{$_POST["ds1"][$i]}','{$_POST["pd"]}')";
    }
    $sql .= implode(",", $rows);
    if ($con->query($sql)) {
        header("location:table-basic.php");
    } else {
        echo "Added Failed!!!";
    }
}

if (isset($_POST["forms"])) {
    $to=$_POST["tobacco"];
    $al=$_POST["Alcohole"];
    $dr=$_POST["drugs"];
    $pid=$_POST["pf"];
    if (mysqli_query($con,"insert into social_his(Tobacco,illegal_Drugs,Alcohole,P_id) values('$to','$al','$dr','$pid')")) {
        header("location:table-basic.php");
    } else {
        echo "Added Failed!!!";
    }
}

if (isset($_POST["surgery"])) {
    $to1=$_POST["disease"];
    $al1=$_POST["trt"];
    $dr1=$_POST["remarks"];
  $pid1=$_POST["pfs"];
    $filename = $_FILES["doc"]["name"];
    $tempname = $_FILES["doc"]["tmp_name"];
    $folder = "doc/" . $filename;
    if (mysqli_query($con,"insert into medicalhistory(P_id,MedHis_disease,MedHis_treatment,MedHis_detail,MedHis_Report) values('$pid1','$to1','$al1','$dr1','$filename')")) {
        move_uploaded_file($tempname, $folder);
        header("location:table-basic.php");
    } else {
        echo "Added Failed!!!";
    }
}