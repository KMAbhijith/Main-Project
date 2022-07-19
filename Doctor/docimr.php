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
                                    <h2 class="title-1">Doctor Verify Details</h2>
                                </div>
                                <hr><br>

                                <?php
                                $changeform = mysqli_query($con, "select  * from imr i ,Doctor d  where  i.D_id=d.D_id and i.D_id=$fd[D_id] ");
                                $im = mysqli_fetch_assoc($changeform);
                                $cfrm = mysqli_num_rows($changeform);
                                if ($cfrm == 0) {
                                ?>
                                    <div class="card" style="padding:20px;border-radius:25px;">
                                        <form action="imr.php" class="was-validated" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="uname">IMR Number</label>
                                                <input type="text" class="form-control" id="imr" placeholder="Enter IMR number" name="imr" pattern="[1-9]{1,6}" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <input type="hidden" name="did" value="<?php echo $fd['D_id']; ?>" />
                                            <div class="form-group">
                                                <label for="uname">Select State Medical Council:</label>
                                                <select id="dept" class="custom-select" name="smc" required>
                                                    <option value="">Open this select menu</option>
                                                    <?php
                                                    $qr =  mysqli_query($con, "select * from statemedicalcouncil");
                                                    while ($r =  mysqli_fetch_array($qr)) {
                                                    ?>
                                                        <option value=" <?php echo $r['SMC_id']; ?>"><?php echo $r['SMC_name']; ?></option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid select </div>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                            </div>
                        <?php } else {
                        ?>
                            <div class="col-lg-8">
                                <div class="card mb-4" style="padding:5px;border-radius:15px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">IMR Number</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $im['IMR_number']; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                        $smc = mysqli_query($con, "select * from statemedicalcouncil where SMC_id=$im[SMC_id]");
                                        $smcd = mysqli_fetch_assoc($smc);
                                        ?>
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
                            <?php } ?>
                            <script>
                                function change_dept() {
                                    var deptspec = $("#deptid").val();

                                    $.ajax({
                                        type: "POST",
                                        url: "scheduleview.php",
                                        data: "deptspec=" + deptspec,
                                        cache: false,
                                        success: function(response) {
                                            //alert(response);return false;
                                            $("#sp").html(response);
                                        }
                                    });
                                }
                            </script>
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