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

        $query1 = "select * from patient p,login l where p.P_id=$uid and l.Log_id=p.Log_id";
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

                        <section style="background-color: #eee;border-radius:25px;">
                            <div class="container py-5">
                                <div class="row">
                                    <div class="col">
                                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="border-radius:25px;">
                                            <h4>PATIENT</h4>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card mb-4" style="border-radius:25px;">
                                            <div class="card-body text-center">

                                                <h5 class="my-3"><?php echo $r1['P_name']; ?></h5>
                                                <center class="m-t-30"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle" width="150" /></center>
                                                <p class="text-muted mb-1">Patient</p><br>
                                                <hr>
                                                <?php
                                                $dateOfBirth = $r1['P_dob'];
                                                $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                                                ?>



                                                <?php $query = "select * from patient p,bloodgroup b where p.P_id='$uid' and p.BL_id=b.BL_id";
                                                $res = mysqli_query($con, $query);

                                                $r2 = mysqli_fetch_array($res); ?>
                                                <div class="card-body"> <small class="text-muted p-t-30 db">Age</small>
                                                    <h6><?php echo $diff->format('%y'); ?></h6><small class="text-muted p-t-30 db">Blood group</small>
                                                    <h6><?php echo $r2['BL_group']; ?></h6><small class="text-muted p-t-30 db">Gender</small>
                                                    <h6><?php echo $r1['P_gender']; ?></h6><small class="text-muted">Email address </small>
                                                    <h6><?php echo $r1['Username']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                                    <h6><?php echo $r1['P_phone']; ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                                    <h6><?php echo $r1['P_address']; ?></h6>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card mb-4" style="padding:5px;border-radius:15px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">Full Name</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <p class="text-muted mb-0"><?php echo $r1['P_name']; ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">Email</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <p class="text-muted mb-0"><?php echo $r1['Username']; ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">Phone</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <p class="text-muted mb-0"><?php echo $r1['P_phone']; ?></p>
                                                    </div>
                                                </div>
                                                <hr>

                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <?php $chk = mysqli_query($con, "select * from disease_his where P_id=$r1[P_id]"); ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Desease History</h4>
                                                <hr>

                                                <?php
                                                while ($dise = mysqli_fetch_array($chk)) {
                                                ?>

                                                    <div class="test rounded-circle">
                                                        <?php echo $dise['Disease']; ?>
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        $chk1 = mysqli_query($con, "select * from family_disease where P_id=$r1[P_id]");
                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Family History (Parents,Siblings)</h4>
                                                <hr>

                                                <?php
                                                while ($dise1 = mysqli_fetch_array($chk1)) {
                                                ?>

                                                    <div class="test rounded-circle">
                                                        <?php echo $dise1['FD_disease']; ?>
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="card ">
                                            <div class="card-body">
                                                <h4>Social History</h4>
                                                <hr>

                                                <?php
                                                $sh = mysqli_query($con, "select * from social_his where P_id=$r1[P_id]");
                                                while ($si = mysqli_fetch_array($sh)) {
                                                ?>

                                                    <div class="test rounded-circle">
                                                        <p> Tobacco user ? : <?php echo $si['Tobacco']; ?></p>
                                                        <p>Drug Addict ? : <?php echo $si['illegal_Drugs']; ?></p>
                                                        <p>Alcoholic ? : <?php echo $si['Alcohole']; ?></p>
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <?php
                                        $c = mysqli_query($con, "select * from medicalhistory where P_id=$r1[P_id]");


                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Surgery details</h4>
                                                <hr>
                                                <table class="table">
                                                    <tr>
                                                        <th>Disease </th>
                                                        <th>Treatment status </th>
                                                        <th>Surgery Details </th>
                                                    </tr>

                                                    <?php
                                                    while ($d = mysqli_fetch_array($c)) {
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $d['MedHis_disease']; ?></td>
                                                            <td> <?php echo $d['MedHis_treatment']; ?></td>
                                                            <td><?php if ($d['MedHis_detail'] == NULL) {
                                                                    echo "NULL";
                                                                } else {
                                                                    echo $d['MedHis_detail'];
                                                                } ?></td>
                                                            <td><?php if ($d['MedHis_Report'] != NULL) { ?><a class="btn btn-primary" href="reportfile.php?pid=<?php echo $d['P_id']; ?>&mhid=<?php echo $d['MedHis_id']; ?>">View Report</a><?php } else {
                                                                                                                                                                                                                                                echo 'Not Available';
                                                                                                                                                                                                                                            } ?></td>
                                                        </tr>



                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table">


                                                            <tr>
                                                                <th>no</th>
                                                                <th>Doctor Name</th>
                                                                <th>Date</th>
                                                                <th>Record's</th>

                                                            </tr>


                                                            <?php
                                                            $j = 1;



                                                            $sdle = mysqli_query($con, "select * from booking b,schedule s,doctor d,patient p where   b.P_id=$uid and  p.P_id=$uid  and d.D_id=$did[D_id] and b.D_id=$did[D_id]  and b.S_id=s.S_id order by W_day desc");
                                                            while ($re12 = mysqli_fetch_array($sdle)) {

                                                                echo "<tr class='text-primary'><td>" .  $j++ . "</td><td>" . $re12['D_name'] . "</td><td> " . $re12['W_day'] . "</td><td><a href='viewpriscribe.php?uid=" . $re12['P_id'] . "&bid=" . $re12['B_id'] . "' class='btn btn-outline-primary'>Records</a></td></tr>";
                                                            }
                                                            ?>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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