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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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


                            <?php
                            $userid = $_GET['uid'];
                            $bookid = $_GET['bid'];
                            $doc1 = mysqli_query($con, "select * from patient where P_id=$userid");
                            $pd = mysqli_fetch_assoc($doc1);
                            $dateOfBirth = $pd['P_dob'];
                            $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                            ?>
                            <?php
                            $sel1 = mysqli_query($con, "select * from labrefassign la,labresult l where la.B_id=$bookid  and la.LA_id=l.LA_id ");

                            if (mysqli_num_rows($sel1) < 1) {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">

                                    <h4>Patient Details</h4>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>Name : <?php echo $pd['P_name']; ?></th>
                                            <th>Age : <?php echo $diff->format('%y'); ?></th>
                                        </tr>
                                        <tr>
                                            <th>Gender : <?php echo $pd['P_gender']; ?></th>
                                            <th>Phone : <?php echo $pd['P_phone']; ?></th>
                                        </tr>

                                    </table>
                                    <hr>

                                    <form class="was-validated" method="POST" action="labrefact.php">
                                        <h4>Referal</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="uname">Tests:</label>
                                            <select id="dept" class="js-example-basic-multiple" name="lab[]" required multiple="multiple">
                                                <option value="">Open this select menu</option>
                                                <?php
                                                $qr =  mysqli_query($con, "select *from labtests");
                                                while ($r =  mysqli_fetch_array($qr)) {
                                                ?>
                                                    <option value=" <?php echo $r['LB_id']; ?>"><?php echo $r['LB_test']; ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback"> invalid select </div>
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                $('.js-example-basic-multiple').select2();
                                            });
                                        </script>
                                        <input class="form-control" type='hidden' name='bid' value="<?php echo $bookid;  ?>" required>
                                        <input class="form-control" type='hidden' name='pid' value="<?php echo $userid;  ?>" required>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" name="submit">Refer To Lab</button>
                                        </div>
                                    </form>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">
                                    <h4>Patient Details</h4>
                                    <hr>
                                    <?php
                                    $do = mysqli_query($con, "select * from patient where P_id=$userid");
                                    $ld = mysqli_fetch_assoc($do);
                                    $dateOfBirth = $ld['P_dob'];
                                    $diff1 = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <th>Name : <?php echo $ld['P_name']; ?></th>
                                            <th>Age : <?php echo $diff1->format('%y'); ?></th>
                                        </tr>
                                        <tr>
                                            <th>Gender : <?php echo $ld['P_gender']; ?></th>
                                            <th>Phone : <?php echo $ld['P_phone']; ?></th>
                                        </tr>

                                    </table>
                                    <hr>


                                    <?php
                                    $m = mysqli_query($con, "select * from labrefassign la,labresult l where la.B_id=$bookid and la.LA_id=l.LA_id ");
                                    $d = mysqli_fetch_array($m);
                                    ?>
                                    <?php
                                    $et1 = mysqli_query($con, "select * from labreferal lr,labtests l,labrefassign lra where  l.LB_id= lr.LB_id and  lr.LA_id=$d[LA_id] and lra.LA_id=$d[LA_id] and lra.B_id=$bookid");

                                    ?>
                                    <table class="table">
                                        <h4>Result</h4>
                                        <hr>
                                        <tr>
                                            <td>Test Type</td>
                                            <td>Status</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="custom-select">
                                                    <?php

                                                    while ($rt = mysqli_fetch_array($et1)) {
                                                    ?>
                                                        <option class="dropdown-item" type="button"><?php echo $rt['LB_test']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <?php
                                            if ($d['LA_resultstatus'] = 0 && $d['LA_resultstatus'] = 1) {
                                            ?>
                                                <td>
                                                    <p class="text-warning">pending</p>
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><a class="btn btn-primary" href="viewlabreport.php?la=<?php echo $d['LA_id'] ?>">View</a></td>
                                            <?php
                                            }
                                            ?>
                                        <tr>



                                    </table>
                                </div>
                            <?php
                            }
                            ?>

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
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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