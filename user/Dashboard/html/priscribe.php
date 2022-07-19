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
                                    <li class="breadcrumb-item active" aria-current="page">prescription</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">prescription</h1>
                        </div>
                        <div class="col-6">
                            <div class="text-end upgrade-btn">
                                <a href="../../html/index.php" class="btn btn-primary text-white">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                $bookid = $_GET['bid'];
                $sel = mysqli_query($con, "select * from priscription p,booking b,medicine m where m.Medi_id=p.Medi_id and p.B_id=$bookid  and  b.B_id=$bookid  and b.P_id=$r11[P_id] and b.D_id=b.D_id");

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
                        <a class="btn btn-primary" href="prsdownload.php?bid=<?php echo $bookid; ?>&pid=<?php echo $r11['P_id']; ?>">Download</a>
                    </div>
                    <?php
                    $sel = mysqli_query($con, "select * from medrecord m,booking b where  m.B_id=b.B_id  and b.P_id=$r11[P_id] and m.B_id=$bookid and b.B_id=$bookid ");
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

                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
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