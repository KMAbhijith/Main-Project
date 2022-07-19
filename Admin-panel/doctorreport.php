<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php
include "connect.php";
if (isset($_POST['yrdoc'])) {
    $yr = $_POST['yr'];
    $query = mysqli_query($con, "select count(b.B_id) as c ,d.D_name from booking b,Doctor d,schedule s where d.D_id=b.D_id and s.S_id=b.S_id and YEAR(s.W_day)=$yr  group by d.D_name;");
    if ($query) {
        echo "<center><br><h5>Booking Report</h5><br><div class='card col-6'><table class='table col-6' style='padding:25px;border-radius:25px;'><tr><td>Doctor Name</td><td>Patient Count($yr)</td></tr>";
        while ($r = mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo  $r['D_name'] ?></td>
                <td><?php echo  $r['c'] ?></td>
            </tr>
<?php
        }
        echo '</table><button class="btn btn-primary" onclick="window.print()">Download</button><br><a class="btn btn-primary" href="reportgen.php" >Close</a></div></center>';
    } else {
        echo "Nothing Found!";
    }
}
?>

<?php

if (isset($_POST['mndoc'])) {
    $yr = $_POST['yr'];
    $mn = $_POST['mn'];
    $query = mysqli_query($con, "select count(b.B_id) as c ,d.D_name  from booking b,Doctor d,schedule s where d.D_id=b.D_id and s.S_id=b.S_id and YEAR(s.W_day)=$yr and MONTH(s.W_day)=$mn  group by d.D_name;");
    if ($query) {
        echo "<center><br><h5>Booking Report</h5><br><div class='card col-6'><table class='table col-6' style='padding:25px;border-radius:25px;'><tr><td>Doctor Name</td><td>Patient Count($mn/$yr)</td></tr>";
        while ($r = mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo  $r['D_name'] ?></td>
                <td><?php echo  $r['c'] ?></td>

            </tr>
<?php
        }
        echo '<td><button class="btn btn-primary" onclick="window.print()">Download</button>&nbsp;<a class="btn btn-primary " href="reportgen.php" >Close</a><td></table></div></center>';
    } else {
        echo "Nothing Found!";
    }
}
?>