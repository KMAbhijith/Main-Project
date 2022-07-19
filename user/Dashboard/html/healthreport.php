<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {

    $ri = $_SESSION['userid'];
    $query = "select * from patient p,bloodgroup b where p.Log_id='$ri' and p.BL_id=b.BL_id";
    $res2 = mysqli_query($con, $query);
    $r11 = mysqli_fetch_array($res2);
?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>Flexy Admin Lite Template by WrapPixel</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <!-- Custom CSS -->
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
            include('sidebar.php');
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
                                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Medical Records</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Routine Checkups</h1>
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
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $sel = mysqli_query($con, "select * from healthpackage h,hpack_book hpb,patient p where  hpb.P_id=$r11[P_id] and p.P_id=$r11[P_id] and  h.HP_id=hpb.HP_id and hpb.status=2");
                            if (mysqli_num_rows($sel)) {
                            ?>

                                <div class="card " style="padding:25px;">
                                    <table class="table">
                                        <tr>
                                            <td>Date</td>
                                            <td>Patient Name</td>
                                            <td>Package</td>
                                            <td>Tests</td>
                                            <td>Status</td>

                                        </tr>
                                        <?php

                                        while ($d = mysqli_fetch_array($sel)) {
                                        ?><tr>
                                                <td><?php echo $d['HPB_date']; ?></td>
                                                <td><?php echo $d['P_name']; ?></td>
                                                <td><?php echo $d['HP_title']; ?></td>
                                                <?php

                                                $et1 = mysqli_query($con, "select * from hpack_assign hpa,healthpackage h,labtests lt where h.HP_id=$d[HP_id] and hpa.HP_id=$d[HP_id] and lt.LB_id=hpa.LB_id ");

                                                ?><td>
                                                    <select class="form-select">
                                                        <?php

                                                        while ($rt = mysqli_fetch_array($et1)) {
                                                        ?>
                                                            <option class="dropdown-item" type="button"><?php echo $rt['LB_test']; ?></option>
                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                </td>
                                                </td>
                                                <td><a class="btn btn-primary" href='hreport.php?hpb=<?php echo  $d['HPB_id'] ?>'>View Report</a></td>
                                            <tr>
                                            <?php
                                        }
                                            ?>
                                    </table>
                                </div>
                        </div>
                    <?php
                            } else {
                    ?>
                        <div class="card " style="padding:25px;">
                            Nothing Up Here !
                        </div>
                    <?php
                            }
                    ?>



                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer text-center">
                        All Rights Reserved by Flexy Admin. Designed and Developed by <a href="https://www.wrappixel.com">WrapPixel</a>.
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