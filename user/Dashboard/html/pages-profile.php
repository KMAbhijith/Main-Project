<?php
session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {

    $ri = $_SESSION['userid'];
    $query = "select * from patient p,bloodgroup b ,login l where p.Log_id='$ri' and l.Log_id='$ri' and p.BL_id=b.BL_id";
    $res = mysqli_query($con, $query);

    $r = mysqli_fetch_array($res);
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
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Profile</h1>
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
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $pic = "select Pro_pics from profileimages where Log_id =$ri and Utype_id=3 ";
                                    $check = mysqli_query($con, $pic);
                                    $fe = mysqli_fetch_array($check);
                                    $count = mysqli_num_rows($check);
                                    if ($count > 0) {
                                    ?>
                                        <center class="m-t-30"> <img src="<?php echo  $fe['Pro_pics']; ?>" class="rounded-circle" width="150" />
                                        <?php } else {
                                        ?> <center class="m-t-30"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle" width="150" />

                                            <?php }  ?>

                                            <h4 class="card-title m-t-10"><?php echo $r['P_name']; ?></h4>
                                            </h6> <small class="text-muted p-t-30 db">Patient</small>

                                            </center>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <?php

                                $dateOfBirth = $r['P_dob'];
                                $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                                ?>
                                <div class="card-body"> <small class="text-muted p-t-30 db">Age</small>
                                    <h6><?php echo $diff->format('%y'); ?></h6><small class="text-muted p-t-30 db">Blood group</small>
                                    <h6><?php echo $r['BL_group']; ?></h6><small class="text-muted p-t-30 db">Gender</small>
                                    <h6><?php echo $r['P_gender']; ?></h6><small class="text-muted">Email address </small>
                                    <h6><?php echo $r['Username']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                    <h6><?php echo $r['P_phone']; ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                    <h6><?php echo $r['P_address']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Update Profile</h4>
                                    <hr>
                                    <form method="POST" action="update.php" class="form-horizontal form-material mx-2 was-validated">

                                        <div class="form-group">
                                            <label class="col-md-12">Email</label>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" name="email" placeholder="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" value="<?php echo $r['Username']; ?>" required />
                                                <div class=" invalid-feedback">invalid Email.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Phone no</label>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="phone" placeholder="phone" pattern="[0-9]{10}" value="<?php echo $r['P_phone']; ?>" required />
                                                <div class="invalid-feedback">invalid phone no.</div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="pid" value="<?php echo $r['P_id']; ?>" />
                                        <input type="hidden" name="lid" value="<?php echo $ri; ?>" />
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" name="updatedetails" class="btn btn-success text-white">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!---    <div class="card">
                                <div class="card-body">
                                    <h4>Update password</h4>
                                    <hr>
                                    <form class="form-horizontal form-material mx-2 was-validated">

                                        <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="password" placeholder="password" value="" required />
                                                <div class="invalid-feedback">invalid password.</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Re-enter Password</label>
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="password2" placeholder="password" value="" required />
                                                <div class="invalid-feedback">invalid password.</div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-success text-white">Update Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
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