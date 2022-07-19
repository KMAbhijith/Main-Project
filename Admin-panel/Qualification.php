<?php
include('connect.php');
$ei = $_GET['id'];
if (mysqli_query($con, "update doctoreducation set De_status='1' where D_edu_id=$ei")) {
    header("location:doctoredverify.php");
}
