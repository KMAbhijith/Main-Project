<?php
include('connect.php');
$dept = $_POST['country'];
$sql = "select * from doctor where Dept_id='$dept'";
$query = $con->query($sql);
echo '<option value="">Select Doctor</option>';
while ($res = $query->fetch_assoc()) {
    echo '<option value="' . $res['D_id'] . '">' . $res['D_name'] . '</option>';
}
