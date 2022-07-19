<?php

include("connect.php");

$id = $_GET['id'];

$qry = mysqli_query($con, "delete from mschedule where MS_id='$id'");



if ($qry) {

    header("location:manage.php");
} else {
    echo mysqli_error($con);
}
