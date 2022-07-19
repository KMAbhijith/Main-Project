<?php
include "connect.php";
if (isset($_POST["submit"])) {
    $bid = $_POST["bid"];
    $pid = $_POST['pid'];
    if (mysqli_query($con, "insert into labrefassign(B_id) values('$bid')")) {
        $lf = $con->insert_id;

        $sql = "insert into labreferal (LB_id,LA_id) values ";
        $rows = [];
        for ($i = 0; $i < count($_POST["lab"]); $i++) {
            $rows[] = "('{$_POST["lab"][$i]}','{$lf}')";
        }
        $sql .= implode(",", $rows);
        if (mysqli_query($con, $sql)) {
            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="labref.php?uid=' . $pid . '&bid=' . $bid . '"</script>');
            } else {
                header("location:labref.php?uid=" . $pid . "&bid=" . $bid . "");
                die();
            }
        }
    }
}
