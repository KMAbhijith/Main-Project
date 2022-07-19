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
    $u = $r['P_id'];

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>One Health - Medical Center HTML5 Template</title>

        <link rel="stylesheet" href="../assets/css/maicons.css">

        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

        <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

        <link rel="stylesheet" href="../assets/css/theme.css">
        <style>
            .card {
                margin: 5% 0%;
            }
        </style>
    </head>

    <body>

        <!-- Back to top button -->
        <div class="back-to-top"></div>

        <?php
        include "nav.php";
        ?>

        <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
            <div class="banner-section">
                <div class="container text-center wow fadeInUp">
                    <nav aria-label="Breadcrumb">
                        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Health Packages</li>
                        </ol>
                    </nav>
                    <h1 class="font-weight-normal">Health Packages</h1>
                </div> <!-- .container -->
            </div> <!-- .banner-section -->
        </div> <!-- .page-banner -->

        <div class="page-section">
            <div class="container">
                <div class="col-lg-12">
                    <div class="sidebar">
                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Health Packages</h3>

                        </div>
                    </div>
                    <?php
                    if (isset($_POST['searchbtn'])) {
                        $s = $_POST['search'];
                    ?>
                        <div class="row">
                            <div class="col">
                                <?php
                                $ern = mysqli_query($con, "SELECT * from healthpackage where  HP_title  LIKE '%$s%' and where HP_patientno >= 1");
                                while ($t = mysqli_fetch_array($ern)) {
                                ?>
                                    <!-- Card -->

                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5> <?php echo $t['HP_title'] ?></h5>
                                        </div>
                                        <div class="card-body">

                                            <p class="card-text"><?php echo $t['HP_remark'] ?></p>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Tests *
                                                </button>
                                                <?php
                                                $et1 = mysqli_query($con, "select * from hpack_assign hpa,healthpackage h,labtests lt where   h.HP_id=$t[HP_id] and hpa.HP_id=$t[HP_id] and lt.LB_id=hpa.LB_id ");

                                                ?>
                                                <div class="dropdown-menu">
                                                    <?php

                                                    while ($rt = mysqli_fetch_array($et1)) {
                                                    ?>
                                                        <button class="dropdown-item" type="button"><?php echo $rt['LB_test']; ?></button>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary" href="Hpackbook.php?hpid=<?php echo $rt['HP_id']; ?>&pid=<?php echo $r['P_id']; ?>">Book Now @ ₹<?php echo $t['HP_price'] ?></button>
                                        </div>
                                        slots left<?php $t['HP_patientno'] ?>
                                        <div class="card-footer text-muted">
                                            offer closes on ' <?php echo date('d', strtotime($t['HP_upto'])); ?>&nbsp;<?php echo date("F", mktime(0, 0, 0, date('m', strtotime($t['HP_upto'])), 10)); ?>'
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        <?php
                    }
                        ?>
                        </div>
                </div>
            </div>


            <div class="container">

                <div class="row">
                    <div class="col">
                        <?php
                        $tt = mysqli_query($con, "select * from healthpackage where HP_patientno >= 1 and HP_from >=CURDATE()");
                        while ($te = mysqli_fetch_array($tt)) {
                        ?>
                            <!-- Card -->
                            <div class="card text-center">
                                <div class="card-header">
                                    <h5> <?php echo $te['HP_title'] ?></h5>
                                </div>
                                <div class="card-body">

                                    <p class="card-text"><?php echo $te['HP_remark'] ?></p>
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tests *
                                        </button>
                                        <?php
                                        $tt1 = mysqli_query($con, "select * from hpack_assign hpa,healthpackage h,labtests lt where  h.HP_id=$te[HP_id] and hpa.HP_id=$te[HP_id] and lt.LB_id=hpa.LB_id  ");

                                        ?>
                                        <div class="dropdown-menu">
                                            <?php

                                            while ($t1 = mysqli_fetch_array($tt1)) {
                                            ?>
                                                <button class="dropdown-item" type="button"><?php echo $t1['LB_test']; ?></button>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <?php
                                    $hbk = mysqli_query($con, "select * from healthpackage h,hpack_book hpb,patient p where h.HP_id=$te[HP_id] and hpb.HP_id=$te[HP_id] and p.P_id= $r[P_id] and hpb.P_id= $r[P_id]");
                                    if (mysqli_num_rows($hbk) < 1) {
                                    ?>
                                        <a class="btn btn-primary" href="paymenthpackbook.php?hpid=<?php echo $te['HP_id']; ?>&pid=<?php echo $r['P_id']; ?>">Book Now @ ₹<?php echo $te['HP_price']; ?></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-danger" href="">Booked @ ₹<?php echo $te['HP_price']; ?></a>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="card-footer text-muted">
                                    slots left :&nbsp;<span style="color:green;"><?php echo $te['HP_patientno'] ?></span><br>
                                    offer closes on ' <?php echo date('d', strtotime($te['HP_upto'])); ?>&nbsp;<?php echo date("F", mktime(0, 0, 0, date('m', strtotime($te['HP_upto'])), 10)); ?>'
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>


            </div> <!-- .row -->
        </div>

        </div> <!-- .row -->
        </div> <!-- .container -->
        </div> <!-- .page-section -->

        <?php include "footer.php" ?>

        <script src="../assets/js/jquery-3.5.1.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="../assets/vendor/wow/wow.min.js"></script>

        <script src="../assets/js/theme.js"></script>

    </body>

    </html>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../../login.php?e=1");
        die();
    }
}


?>