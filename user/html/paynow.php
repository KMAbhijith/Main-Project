<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {
    $plog1 = $_SESSION['userid'];
    $vr1 = mysqli_query($con, "select P_id,Log_id from patient where Log_id=$plog1");
    $pid1 = mysqli_fetch_assoc($vr1);
    $scid1 = $_GET['id'];
    $docid1 = mysqli_query($con, "select D_id from schedule where S_id=$scid1");
    $did1 = mysqli_fetch_assoc($docid1);
    $p = $pid1['P_id'];
    $d = $did1['D_id'];
    $sql1 = "select *  from booking where S_id=$scid1 and P_id=$p and D_id=$d   ";
    $query1 = mysqli_query($con, $sql1);
    $count = mysqli_num_rows($query1);
    if ($count < 1) {

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
                                <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                            </ol>
                        </nav>
                        <h1 class="font-weight-normal">Book Slots</h1>
                    </div> <!-- .container -->
                </div> <!-- .banner-section -->
            </div> <!-- .page-banner -->

            <div class="main-content">
                <div class="section__content section__content--p30" style="margin-top: -20px;">

                    <section style="background-color: #eee;border-radius:25px;">
                        <div class="container py-5 col-10">

                            <?php
                            $plog = $_SESSION['userid'];
                            $vr = mysqli_query($con, "select P_id,Log_id from patient where Log_id=$plog");
                            $pid = mysqli_fetch_assoc($vr);
                            $scid = $_GET['id'];

                            $docid = mysqli_query($con, "select D_id from schedule where S_id=$scid");
                            $dd = mysqli_fetch_assoc($docid);
                            ?>
                            <div class="row ">
                                <div class="col-lg-4">
                                    <div class="card mb-4" style="border-radius:25px;">
                                        <div class="card-body text-center">


                                            <a type="submit" name="submit" class="btn btn-primary" href="paymentgateway.php?sid=<?php echo $scid ?>&did=<?php echo $dd['D_id'] ?>&pid=<?php echo $pid['P_id'] ?>">Pay ₹250</a>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>

                </div>
            </div>





            <?php include "footer.php" ?>

            <script src="../assets/js/jquery-3.5.1.min.js">
            </script>

            <script src="../assets/js/bootstrap.bundle.min.js"></script>

            <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

            <script src="../assets/vendor/wow/wow.min.js"></script>

            <script src="../assets/js/theme.js"></script>

        </body>

        </html>
    <?php
    } else {
    ?>
        <script>
            alert("You have already booked");
        </script>
<?php
        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="../Dashboard/html/index.php?hi=1"</script>');
        } else {
            header("location:../Dashboard/html/index.php?hi=1");
            die();
        }
    }
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../../login.php?e=1"</script>');
    } else {
        header("location:../../login.php?e=1");
        die();
    }
}


?>