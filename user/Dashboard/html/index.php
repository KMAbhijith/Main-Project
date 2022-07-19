<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {
?>
    <?php
    $ri = $_SESSION['userid'];
    $query = "select * from patient where Log_id='$ri'";
    $res = mysqli_query($con, $query);

    $r = mysqli_fetch_array($res);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>E-care</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <!-- Custom CSS -->
        <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
        </link>
        <script type="text/javascript">
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {
                null;
            }
        </script>

    </head>

    <body>

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <?php
            include("topbar.php");
            ?>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php
            include("sidebar.php");
            ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 d-flex align-items-center">
                                    <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Dashboard</h1>
                        </div>
                        <div class="col-6">
                            <div class="text-end upgrade-btn">
                                <a href="../../../index.php" class="btn btn-primary text-white">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <?php
                    if (isset($_GET['d'])) {
                    ?>
                        <script>
                            swal("Sorry!", "Error Occured!", "error");
                        </script>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['e'])) {
                    ?>
                        <script>
                            swal("Good job!", "Your slots have been booked!", "success");
                        </script>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['hi'])) {
                    ?>
                        <script>
                            swal("Booked!", "Already booked!", "error");
                        </script>
                    <?php
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <table class="table  col-12" style="border-radius:25px;">
                                    <h3>Appointments</h3>
                                    <hr>

                                    <tr>
                                        <th>no</th>
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Toke no.</th>


                                    </tr>



                                    <?php
                                    $j = 1;



                                    $sdle = mysqli_query($con, "select * from booking b,schedule s,doctor d,patient p where b.P_id=$r[P_id] and p.P_id=$r[P_id]  and d.D_id=b.D_id and b.S_id=s.S_id and s.W_day>=CURDATE()");
                                    while ($re12 = mysqli_fetch_array($sdle)) {
                                        $time = $re12['S_Time'];
                                        echo "<tr><td>" .  $j++ . "</td><td>" . $re12['D_name'] . "</td><td>" . $re12['W_day'] . "</td><td> " . date('h:i A ', strtotime($time)) . "</td><td class='text-success'> " . $re12['tokenno'] . "</td></tr>";
                                    }
                                    ?>


                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <table class="table  col-12" style="border-radius:25px;">
                                    <h3>Package Appointments</h3>
                                    <hr>

                                    <tr>
                                        <th>no</th>
                                        <th>Package Name</th>
                                        <th>From</th>
                                        <th>To</th>


                                    </tr>



                                    <?php
                                    $j = 1;



                                    $sdle1 = mysqli_query($con, "select * from healthpackage h,hpack_book hpb,patient p where p.P_id=$r[P_id] and hpb.P_id=$r[P_id] and h.HP_id=hpb.HP_id  and h.HP_upto>=CURDATE()");
                                    while ($re121 = mysqli_fetch_array($sdle1)) {

                                        echo "<tr><td>" .  $j++ . "</td><td>" . $re121['HP_title'] . "</td><td>" . $re121['HP_from'] . "</td><td>" . $re121['HP_upto'] . "</td></tr>";
                                    }
                                    ?>


                                </table>


                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Recent comment and chats -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- Recent comment and chats -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">

                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="../dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../dist/js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
    </body>

    </html>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../../../login.php?e=1"</script>');
    } else {
        header("location:../../../login.php?e=1");
        die();
    }
}


?>