<?php
include('connect.php');

$did = $_POST['btnsch'];
$sql = "select TIME_FORMAT(S_Time,'%r') AS stime,TIME_FORMAT(E_time,'%r') AS etime  from schedule where S_id=$did  ";
$query = mysqli_query($con, $sql);

while ($res = mysqli_fetch_array($query)) {

    echo "<a class='btn btn-primary col-3' style='border-radius:25px;' onclick='con();'>" . $res['stime'] . " - " .  $res['etime'] . "</a>";
}
