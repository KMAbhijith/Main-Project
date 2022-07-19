<?php
include("connect.php");
if (isset($_POST["save"])) {

    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/m/d h:i:s a', time());
    $med = $_POST["medname"];
    $dose = $_POST["dosage"];
    $qty = $_POST["qnty"];
    $bid = $_POST["bookid"];
    $uid = $_POST["uid"];
    $s = "insert into priscription(Medi_id,meddose,medqty,B_id,Date) values ('$med','$dose','$qty','$bid','$date')";
    if (mysqli_query($con, $s)) {
        header("location:priscribe.php?uid=" . $uid . "&bid=" . $bid);
    } else {
        echo "Added Failed!!!";
    }
}
