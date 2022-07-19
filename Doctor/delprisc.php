<?php
include("connect.php");
$uid1 = $_GET["uid"];
$bid1 = $_GET["bid"];
$priscid = $_GET["prisc"];
$ss = "delete from priscription where med_id=$priscid ";
if (mysqli_query($con, $ss)) {

    header("location:priscribe.php?uid=" . $uid1 . "&bid=" . $bid1);
} else {
    echo "Delete Failed!!!";
}
