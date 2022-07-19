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
                                    <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Med-History</h1>
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
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">

                                    <form class="was-validated" method="POST" action="diseasehis.php" enctype="multipart/form-data">
                                        <h4>Surgery Details</h4>
                                        <hr>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="disease" placeholder="Disease" value="" required />
                                            <div class="invalid-feedback">Remarks.</div>
                                        </div>

                                        <input type="hidden" name="pfs" value="<?php echo $r11['P_id']; ?>" />

                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="validationFormCheck2" name="trt" value="Undergoing Treatment" required>
                                            <label class="form-check-label" for="validationFormCheck2">Undergoing Treatment</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="validationFormCheck3" name="trt" value="Cured" required>
                                            <label class="form-check-label" for="validationFormCheck3">Cured</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="radio" class="form-check-input" id="validationFormCheck3" name="trt" value="No Treatments" required>
                                            <label class="form-check-label" for="validationFormCheck3">No Treatments</label>
                                            <div class="invalid-feedback">invalid feedback </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="validationTextarea" class="form-label">Remarks</label>
                                            <textarea class="form-control " id="validationTextarea" placeholder="Details if any" name="remarks"></textarea>
                                            <div class="invalid-feedback">
                                                Remarks.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="doc" aria-label="file example">
                                            <div class="invalid-feedback"> invalid form file feedback</div>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" name="surgery">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <?php
                            $chk = mysqli_query($con, "select * from disease_his where P_id=$r11[P_id]");
                            $countds = mysqli_num_rows($chk);
                            if ($countds < 1) {
                            ?>
                                <div class="card">
                                    <div class="card-body">

                                        <form class="has-validation" id="frm" name="frm" method="POST" action="diseasehis.php" onsubmit="return handleData()">
                                            <h4>Desease History</h4>
                                            <div style="visibility:hidden; color:red; " id="chk_option_error">
                                                Please select at least one option.
                                            </div>
                                            <hr>
                                            <input type="hidden" name="pid" value="<?php echo $r11['P_id']; ?>" />
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="checkbox" value="Astma" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Astma
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Cancer" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Cancer
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value=" Depression" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Depression
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Epilepsy" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Epilepsy
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Heart desease" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Heart desease
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Liver desease" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Liver desease
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="High Blood pressure" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    High Blood pressure
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Allergies" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Allergies
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Hepatites" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Hepatites
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Rheumatic fever" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Rheumatic fever
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Kidney desease" name="ds[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Kidney desease
                                                </label>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
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
                            }
                            ?>

                            <script>
                                function handleData() {
                                    var form_data = new FormData(document.querySelector("frm"));
                                    if (!form_data.has("ds[]")) {
                                        document.getElementById("chk_option_error").style.visibility = "visible";
                                        return false;
                                    } else {
                                        document.getElementById("chk_option_error").style.visibility = "hidden";
                                        return true;
                                    }

                                }
                            </script>

                            <?php
                            $chk1 = mysqli_query($con, "select * from family_disease where P_id=$r11[P_id]");
                            $countds1 = mysqli_num_rows($chk1);
                            if ($countds1 < 1) {
                            ?>
                                <div class="card">
                                    <div class="card-body">

                                        <form class="has-validation" name="fm" id="fm" method="POST" action="diseasehis.php" onsubmit="return handleDataa()">
                                            <h4>Family History (Parents,Siblings)</h4>
                                            <div style="visibility:hidden; color:red; " id="chk_option_errora">
                                                Please select at least one option.
                                            </div>
                                            <hr>

                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="checkbox" value="Astma" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Astma
                                                </label>
                                            </div>
                                            <input type="hidden" name="pd" value="<?php echo $r11['P_id']; ?>" />
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Cancer" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Cancer
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Depression" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Depression
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Epilepsy" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Epilepsy
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Heart desease" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Heart desease
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Liver desease" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Liver desease
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="High Blood pressure" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    High Blood pressure
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Allergies" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Allergies
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Hepatites" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Hepatites
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Rheumatic fever" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Rheumatic fever
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="Kidney desease" name="ds1[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Kidney desease
                                                </label>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit" name="add">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    <?php
                            } else {
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
                    <?php
                            }
                    ?>
                    <script>
                        function handleDataa() {
                            var form_data = new FormData(document.querySelector("fm"));
                            if (!form_data.has("ds1[]")) {
                                document.getElementById("chk_option_errora").style.visibility = "visible";
                                return false;
                            } else {
                                document.getElementById("chk_option_errora").style.visibility = "hidden";
                                return true;
                            }

                        }
                    </script>


                    <?php
                    $sh = mysqli_query($con, "select * from social_his where P_id=$r11[P_id]");
                    $shc = mysqli_num_rows($sh);
                    if ($shc < 1) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Social History</h4>
                                <hr>

                                <form class="was-validated" method="POST" action="diseasehis.php">
                                    <input type="hidden" name="pf" value="<?php echo $r11['P_id']; ?>" />
                                    <label>Do you use or have history of using Tobacco?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tobacco" id="inlineRadio1" value="Yes" required>
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tobacco" id="inlineRadio2" value="No" required>
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <div class="invalid-feedback">invalid feedback </div>
                                    <br>
                                    <label>Do you use or have history of using illegal Drugs?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="drugs" id="inlineRadio1" value="Yes" required>
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="drugs" id="inlineRadio2" value="No" required>
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <div class="invalid-feedback">invalid feedback </div>
                                    <br>
                                    <label>How often you consumes Alcohole?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Alcohole" id="inlineRadio1" value="Regulerly" required>
                                        <label class="form-check-label" for="inlineRadio1">Regulerly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Alcohole" id="inlineRadio2" value="Occcasionaly" required>
                                        <label class="form-check-label" for="inlineRadio2">Occcasionaly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Alcohole" id="inlineRadio2" value="No" required>
                                        <label class="form-check-label" for="inlineRadio2">No</label>

                                    </div>
                                    <div class="invalid-feedback">invalid feedback </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit" name="forms">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Social History</h4>
                                <hr>

                                <?php
                                while ($si = mysqli_fetch_array($sh)) {
                                ?>

                                    <div class="test rounded-circle">
                                        <p> Tobacco user ? :<?php echo $si['Tobacco']; ?></p>
                                        <p>Drug Addict ? : <?php echo $si['illegal_Drugs']; ?></p>
                                        <p>Alcoholic ? :<?php echo $si['Alcohole']; ?></p>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    $c = mysqli_query($con, "select * from medicalhistory where P_id=$r11[P_id]");


                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h4>Surgery details</h4>
                            <hr>
                            <table class="table">
                                <tr>
                                    <th><b>Disease </b></th>
                                    <th><b>Treatment status </b></th>
                                    <th><b>Surgery Details </b></th>
                                </tr>

                                <?php
                                while ($d = mysqli_fetch_array($c)) {
                                ?>

                                    <tr>
                                        <th><?php echo $d['MedHis_disease']; ?></th>
                                        <th> <?php echo $d['MedHis_treatment']; ?></th>
                                        <th><?php echo $d['MedHis_detail']; ?></th>
                                    </tr>



                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    </div>






                </div>
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