<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<?php
include "connect.php";
if (isset($_POST['yrlabdoc'])) {
    $yr = $_POST['yr'];
    $query = mysqli_query($con, "SELECT lt.LB_test,count(lb.LB_id) as c FROM labrefassign l,labreferal lb,labtests lt where l.LA_id=lb.LA_id and lt.LB_id=lb.LB_id and YEAR(l.LA_date)=$yr   group by LB_test");
    if ($query) {
        echo "<center><br><h5>Booking Report</h5><br><div class='card col-6'><table class='table col-6' style='padding:25px;border-radius:25px;'><tr><td>Lab Test</td><td>Patient Count($yr)</td></tr>";
        while ($r = mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo  $r['LB_test'] ?></td>
                <td><?php echo  $r['c'] ?></td>
            </tr>
        <?php
        }
        ?>
        <center>
            <td><a class="btn btn-outline-primary col-6" onclick="window.print()">Download</a>&nbsp;<a class="btn btn-outline-primary col-4" href="labrepgen.php">Close</a>
            <td>
                </table>
                </div>
        </center>
<?php
    } else {
        echo "Nothing Found!";
    }
}
?>

<?php
if (isset($_POST['mnlabdoc'])) {
    $yr = $_POST['yr'];
    $mn = $_POST['mn'];
    $query = mysqli_query($con, "SELECT lt.LB_test,count(lb.LB_id) as c FROM labrefassign l,labreferal lb,labtests lt where l.LA_id=lb.LA_id and lt.LB_id=lb.LB_id and MONTH(l.LA_date)=$mn  and YEAR(l.LA_date)=$yr   group by LB_test");
    if ($query) {
?> <center><br>
            <h5>Booking Report</h5><br>
            <div class='card col-6'>
                <table class='table col-6' style='padding:25px;border-radius:25px;'>
                    <tr>
                        <td>Lab Test</td>
                        <td>Patient Count(<?php echo $mn ?>/<?php echo $yr ?>)</td>
                    </tr>
                    <?php
                    while ($r = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo  $r['LB_test'] ?></td>
                            <td><?php echo  $r['c'] ?></td>

                        </tr>
                    <?php
                    }
                    ?><td><button class="btn btn-outline-primary" onclick="window.print()">Download</button>&nbsp;<a class="btn btn-outline-primary " href="labrepgen.php">Close</a>
                    <td>
                </table>
            </div>
        </center>
<?php
    } else {
        echo "Nothing Found!";
    }
}
?>