<?php

include('connect.php');
$sid = $_POST['btnsch'];
$pid = $_POST['uid'];
$did = $_POST['did'];
$sql = "select TIME_FORMAT(S_Time,'%r') AS stime,TIME_FORMAT(E_time,'%r') AS etime,S_id,S_sltno  from schedule  where S_id=$sid    ";
$query = mysqli_query($con, $sql);


while ($res = mysqli_fetch_array($query)) {
    if ($res['S_sltno'] > 0) {
        $ss = $res['S_id'];

        $select = mysqli_query($con, "select * from booking where S_id=$sid and P_id=$pid and D_id=$did");
        if (mysqli_num_rows($select) < 1) {
            echo "<a class='btn btn-primary col-3' style='border-radius:10px;' href='paynow.php?id=" . $res['S_id'] . "'  onclick='con();'>" . date('h:i A ', strtotime($res['stime'])) . " - " .  date('h:i A ', strtotime($res['etime'])) . "</a>";
        } else {
            echo "<span style='color:red'>You have already booked this slot</span>";
        }
    } else {
        echo "<span style='color:red'>Slots are filled</span>";
    }
}
