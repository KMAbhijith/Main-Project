<?php

session_start();
include "connect.php";

if (isset($_SESSION['lab'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-care</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
            include "sidenavbar.php";
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Lab Referral</h1>

                </div>

                <!-- Content Row -->






                <?php
                $la = $_GET['lba'];
                $bi = $_GET['bid'];
                $sel = mysqli_query($con, "select * from labrefassign tr,booking b,patient p,doctor d where  b.P_id=p.P_id and b.D_id=d.D_id and tr.B_id=$bi and b.B_id=$bi and  tr.B_id=tr.B_id and LA_resultstatus=1");

                ?>

                <div class="card " style="padding:25px;border-radius:25px;">
                    <table class="table">


                        <?php

                        $d = mysqli_fetch_array($sel)
                        ?>
                        <tr>
                            <td>Patient : <?php echo $d['P_name']; ?></td>
                        </tr>
                        <?php $dateOfBirth = $d['P_dob'];
                        $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                        ?>
                        <tr>
                            <td>Patient Age : <?php echo $diff->format('%y'); ?></td>
                        </tr>
                        <tr>
                            <td>Refered by : Dr.<?php echo $d['D_name']; ?></td>
                        </tr>

                    </table>
                </div>
                <br>
                <?php
                $et1 = mysqli_query($con, "select * from labreferal lr,labtests l ,labrefassign lra where  l.LB_id=lr.LB_id and   lr.LA_id=$la and lra.LA_id=$la and lra.B_id=$bi");

                ?>
                <div class="card " style="padding:25px;border-radius:25px;">
                    <h4>Tests</h4>
                    <table class="table">
                        <tr>
                            <?php
                            while ($rt = mysqli_fetch_array($et1)) {
                            ?>
                                <td><b><?php echo $rt['LB_test']; ?></b></td>

                            <?php
                            }
                            ?>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <form id="form" action="reportupload.php" method="POST" class="was-validated" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Report</label>
                            <input class="form-control" type="file" name="pdfdo" id="pdfdo" onchange="Checkfilesreport();" accept="application/pdf" required>
                            <div>*pdf only</div>
                        </div>
                        <input type="hidden" name="la" value="<?php echo $la ?>" />
                        <button class="btn btn-primary" name="labref" type="submit">Upload</button>
                    </form>
                </div>
            </div>

            <script>
                function Checkfilesreport() {
                    var fup = document.getElementById('pdfdo');
                    var fileName = fup.value;
                    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                    if (ext == "pdf") {
                        return true;
                    } else {

                        document.getElementById("pdfdo").value = "";
                        fup.focus();
                        return false;
                    }
                }
            </script>


            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->


                    <!-- Color System -->


                </div>

                <div class="col-lg-6 mb-4">

                    <!-- Illustrations -->


                    <!-- Approach -->


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


        <!-- End of Main Content -->

        <!-- Footer -->

        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}


?>