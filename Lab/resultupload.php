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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                include "request.php"
                ?>



                <?php
                $sel = mysqli_query($con, "select * from labrefassign tr,booking b,patient p,doctor d where  b.P_id=p.P_id and b.D_id=d.D_id and tr.B_id=b.B_id and  tr.B_id=tr.B_id and LA_resultstatus=2");
                if (mysqli_num_rows($sel)) {
                ?>

                    <div class="card " style="padding:25px;">
                        <input type="text" id="myInput" placeholder="seach name/date..." class="form-control" />
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Patient Name</td>
                                    <td>Doctor Name</td>
                                    <td>Lab Tests</td>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php

                                while ($d = mysqli_fetch_array($sel)) {
                                ?>
                                    <tr>
                                        <td><?php echo $d['LA_date']; ?></td>
                                        <td><?php echo $d['P_name']; ?></td>
                                        <td><?php echo $d['D_name']; ?></td>
                                        <?php
                                        $et1 = mysqli_query($con, "select * from labreferal lr,labtests l ,labrefassign lra where  l.LB_id= lr.LB_id and  lr.LA_id=$d[LA_id] and lra.LA_id=$d[LA_id] and lra.B_id=$d[B_id]");

                                        ?>
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
                                        <td><a class="btn btn-danger" href="report.php?la=<?php echo $d['LA_id'] ?>">View</a></td>
                                    <tr>

                                    <?php
                                }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>

            </div>
        <?php
                } else {
        ?>
            <div class="card" style="padding:25px;">
                Nothing Up Here !
            </div>
        <?php
                }
        ?>

        <!-- Content Row -->
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