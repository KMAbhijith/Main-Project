<?php

include("connect.php");

$id = $_GET['id'];

$qry = mysqli_query($con, "delete from schedule where S_id='$id'");



if ($qry) {

    header("location:manage.php");
} else {
    echo mysqli_error($con);
}
