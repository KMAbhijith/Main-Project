<?php
include "connect.php";

session_start();
include "connect.php";
if (isset($_SESSION['doctor'])) {
    $id = $_SESSION['doctor'];
    $doc = mysqli_query($con, "select * from doctor where Log_id=$id");
    $fd = mysqli_fetch_assoc($doc);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Forms</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <?php
            include "index-sidebar.php";
            ?>

            <!-- PAGE CONTAINER-->
            <div class="page-container">

                <?php
                include "nav.php";
                ?>
                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                            <!-- table -->

                            <div class="container col-lg-6">

                                <div class="overview-wrap">
                                    <h2 class="title-1">Appointments</h2>
                                </div>
                                <hr><br>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $("#myInput").on("keyup", function() {
                                            var value = $(this).val().toLowerCase();
                                            $("#myTable tr").filter(function() {
                                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                            });
                                        });
                                    });
                                </script>

                                <div class="card" style="padding:25px;border-radius:25px;">
                                    <input type="text" id="myInput" placeholder="seach name/date..." class="form-control" />
                                    <hr>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Token no</th>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>View Patient</th>
                                                <th>Medical Record</th>
                                                <th>Prescribe</th>
                                                <th>Lab </th>

                                            </tr>
                                        </thead>
                                        <tbody id="myTable">

                                            <?php




                                            $sdle = mysqli_query($con, "select *,TIME_FORMAT(s.S_Time,'%r') AS stime from booking b,schedule s,doctor d,patient p where   b.P_id= p.P_id  and d.D_id=$fd[D_id] and b.D_id=$fd[D_id] and b.S_id=s.S_id and s.W_day>CURDATE() order by s.W_day , b.tokenno  ");
                                            while ($re12 = mysqli_fetch_array($sdle)) {

                                                echo "<tr><td>" .  $re12['tokenno'] . "</td><td>" . $re12['P_name'] . "</td><td> " . date('d/m/Y ', strtotime($re12['W_day'])) . "</td><td> " . date('h:i A ', strtotime($re12['stime'])) . "</td><td><a href='patientprofile.php?uid=" . $re12['P_id'] . "&bid=" . $re12['B_id'] . "' class='btn btn-outline-primary'>View patient</a></td><td><a href='addrecord.php?uid=" . $re12['P_id'] . "&bid=" . $re12['B_id'] . "' class='btn btn-outline-primary'>Add record</a></td><td><a href='priscribe.php?uid=" . $re12['P_id'] . "&bid=" . $re12['B_id'] . "' class='btn btn-outline-primary'>Prescription</a></td><td><a href='labref.php?uid=" . $re12['P_id'] . "&bid=" . $re12['B_id'] . "' class='btn btn-outline-primary'>Lab</a></td></tr>";
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>





                            </div>

                        </div>
                    </div>
                </div>




                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

                <script src="vendor/slick/slick.min.js"> </script>
                <script src="vendor/wow/wow.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="vendor/circle-progress/circle-progress.min.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="vendor/select2/select2.min.js">
                </script>


                <script src="js/main.js"></script>

    </body>

    </html>

<?php } else {

    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}
?>