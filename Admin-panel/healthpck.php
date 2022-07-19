<?php
include "connect.php";
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
                        <?php
                        $rt = mysqli_query($con, "select * from labtests ");
                        ?>
                        <div class="container col-lg-6" style="padding:25px;border-radius:20px;">
                            <div class="card" style="padding:25px;border-radius:20px;">
                                <h4>Health Package</h4>
                                <hr><br>

                                <form action="healthpck.php" method="POST" class="was-validated" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="">Package name</label>
                                        <input type="text" class="form-control" name="title" placeholder="Package" value="" required />
                                        <div class="invalid-feedback">invalid Package name</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">No.of Patients</label>
                                        <input type="number" class="form-control" name="no" placeholder="Max. Patients" value="" required />
                                        <div class="invalid-feedback">enter Max. Patients</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Price</label>
                                        <input type="number" class="form-control" name="price" placeholder="price" value="" required />
                                        <div class="invalid-feedback">invalid Price</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">From</label>
                                        <input type="date" class="form-control" name="vf" placeholder="validfrom" value="" min="<?= date('Y-m-d'); ?>" required />
                                        <div class="invalid-feedback">invalid date</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Upto</label>
                                        <input type="date" class="form-control" name="vt" placeholder="validto" value="" min="<?= date('Y-m-d'); ?>" required />
                                        <div class="invalid-feedback">invalid date</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Package Remark</label>
                                        <textarea class="form-control" name="remark" placeholder="Package Remark" value="" required></textarea>
                                        <div class="invalid-feedback">Package Remark</div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Tests</label>
                                        <select name="test[]" multiple class="3col active form-control" required>
                                            <?php while ($e = mysqli_fetch_array($rt)) {
                                            ?>
                                                <option value="<?php echo $e['LB_id'];   ?>"><?php echo $e['LB_test'];   ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Package Remark
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Package thumbnail</label>
                                        <input type="file" class="form-control" name="doc" aria-label="file example" required>
                                        <div class="invalid-feedback"> invalid form file feedback</div>
                                    </div>
                                    <div class=" form-group  mb-3">
                                        <button class="btn btn-primary" type="submit" name="submit">Add</button>
                                    </div>


                                </form>
                            </div>
                            <br>



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
<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $no = $_POST['no'];
    $price = $_POST['price'];
    $vf = $_POST['vf'];
    $vt = $_POST['vt'];
    $remark = $_POST['remark'];
    $filename = $_FILES["doc"]["name"];
    $tempname = $_FILES["doc"]["tmp_name"];
    $folder = "images/" . $filename;

    $sql = "insert into healthpackage (HP_title,HP_patientno,HP_price,HP_from,HP_upto,HP_remark,HP_pic) values('$title','$no','$price','$vf','$vt','$remark','$filename')  ";
    if (mysqli_query($con, $sql)) {
        move_uploaded_file($tempname, $folder);
        $hp = $con->insert_id;
        $sql = "insert into hpack_assign(HP_id,LB_id) values ";
        $rows = [];
        for ($i = 0; $i < count($_POST["test"]); $i++) {
            $rows[] = "('{$hp}','{$_POST["test"][$i]}')";
        }
        $sql .= implode(",", $rows);
        if ($con->query($sql)) {
            header("location:healthpack.php");
        } else {
            echo "Added Failed!!!";
        }
    }
}
