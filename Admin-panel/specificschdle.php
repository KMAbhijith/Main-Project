<?php
session_start();
include "connect.php";
if (isset($_SESSION['admin'])) {

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
        $ri = $_GET['id'];


        $query = "select * from doctor where D_id='$ri'";

        $res = mysqli_query($con, $query);

        $r = mysqli_fetch_array($res);
        $query1 = "select * from department where Dept_id='$r[Dept_id]'";
        $res1 = mysqli_query($con, $query1);
        $d = mysqli_fetch_array($res1);
        $query2 = "select * from specializations where Dept_id='$r[Dept_id]' and D_specialization_id=$r[D_specialization_id]";
        $res2 = mysqli_query($con, $query2);
        $sp = mysqli_fetch_array($res2);

        ?>
        <?php
        $pic = "select Pro_pics from profileimages where Log_id =$r[Log_id] and Utype_id=2 ";
        $check = mysqli_query($con, $pic);
        $fe = mysqli_fetch_array($check);
        $edu = mysqli_query($con, "select * from doctoreducation where D_id='$ri' ");
        $fetch = mysqli_fetch_assoc($edu);


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

                    <div class="section__content section__content--p30">

                        <section style=" background-color: #eee;border-radius:25px;">
                            <div class="container py-5 col-10">

                                <div class="col">
                                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="border-radius:25px;">
                                        <h4>Doctor details</h4>
                                    </nav>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card mb-4" style="border-radius:25px;">
                                            <div class="card-body text-center">
                                                <img src="../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                                <h5 class="my-3"><?php echo $r['D_name']; ?></h5>
                                                <p class="text-muted mb-1">Doctor</p>
                                                <p class="text-muted mb-4">Specialised in&nbsp;<?php echo $sp['D_specializations']; ?><br><?php echo $d['Dept_name']; ?>&nbsp;Department</p>
                                                <hr>
                                                <h5 class="my-3">Qualifications</h5>
                                                <?php
                                                if (!empty($fetch)) {
                                                ?>
                                                    <p class="text-muted mb-1"><?php echo $fetch['D_edu_qualification'];  ?></p>
                                                <?php
                                                } else {
                                                ?> <p class="text-muted mb-1">Nothing Added</p>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-8 ">
                                        <div class="card mb-4" style="padding:25px;border-radius:25px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">Full Name</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <p class="text-muted mb-0"><?php echo $r['D_name']; ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">Phone</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <p class="text-muted mb-0"><?php echo $r['D_phone']; ?></p>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $doc1 = mysqli_query($con, "select * from doctor where D_id='$ri'");
                                $d1 = mysqli_fetch_array($doc1);

                                ?>
                                <?php
                                $smc = mysqli_query($con, "select * from imr i ,statemedicalcouncil s where i.D_id=$d1[D_id] and s.SMC_id=i.SMC_id");
                                $smcd = mysqli_fetch_assoc($smc);
                                ?>
                                <div class="col-lg-12">
                                    <div class="card mb-4" style="padding:5px;border-radius:15px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">IMR Number</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo $smcd['IMR_number']; ?></p>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">State Medical Council </p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo $smcd['SMC_name']; ?></p>
                                                </div>
                                            </div>
                                            <hr>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card mb-4" style="padding:5px;border-radius:15px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"> License</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <a class="btn btn-primary" href='viewlicense.php?did=<?php echo  $fetch['D_id'] ?>'>View License</a>
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
            <script>
                function schedule() {

                    var btnsch = event.target.value;

                    $.ajax({
                        type: "POST",
                        url: "schd.php",
                        data: "btnsch=" + btnsch,
                        cache: false,
                        success: function(response) {
                            //alert(response);return false;
                            $("#schd").html(response);
                        }
                    });

                }
            </script>

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
<?php } else {

    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}
?>