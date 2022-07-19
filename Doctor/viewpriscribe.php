<?php

session_start();
include "connect.php";

if (isset($_SESSION['doctor'])) {
    $log = $_SESSION['doctor'];
    $docno = mysqli_query($con, "select * from doctor where Log_id=$log");
    $did = mysqli_fetch_array($docno);
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
        <title>Dashboard</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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

    <body>
        <?php
        $uid = $_GET['uid'];
        $bid = $_GET['bid'];

        $query1 = "select * from patient where P_id=$uid";
        $res = mysqli_query($con, $query1);
        $r1 = mysqli_fetch_array($res);

        ?>

        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
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
                    <div class="section__content section__content--p30" style="margin-top: -40px;">


                        <div class="container py-5">
                            <?php


                            $sel = mysqli_query($con, "select * from priscription p,booking b,medicine m where m.Medi_id=p.Medi_id and  p.B_id=$bid  and  b.B_id=$bid  and b.P_id=$uid and b.D_id=$did[D_id] and b.D_id=$did[D_id]");

                            ?>
                            <div class="container-fluid">
                                <div class="card col-10" style="border-radius:25px;padding:25px;">
                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Dosage</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($result = mysqli_fetch_array($sel)) {
                                            ?>


                                                <tr>
                                                    <th><?php echo $result['Med_name']; ?></th>
                                                    <th><?php echo $result['meddose']; ?></th>
                                                    <th><?php echo $result['medqty']; ?></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                $sel = mysqli_query($con, "select * from medrecord m,booking b where  m.B_id=b.B_id  and b.P_id=$uid and m.B_id=$bid and b.B_id=$bid ");
                                $countrecord = mysqli_num_rows($sel);
                                if ($countrecord > 0) {
                                ?>

                                    <div class="card col-10" style="border-radius:25px;padding:25px;">
                                        <table class="table">
                                            <div class="overview-wrap">
                                                <h4>Record</h4>
                                            </div>
                                            <hr>

                                            <?php
                                            $result = mysqli_fetch_assoc($sel)
                                            ?>
                                            <tr>
                                                <th>Title</th>
                                                <th><?php echo $result['title']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Discription</th>
                                                <th><?php echo $result['discription']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Precuation</th>
                                                <th><?php echo $result['precuation']; ?></th>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            </section>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->


                </div>

                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="vendor/slick/slick.min.js">
                </script>
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

                <!-- Main JS-->
                <script src="js/main.js"></script>

    </body>

    </html>
    <!-- end document-->
<?php } ?>