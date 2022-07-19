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

                            <?php
                            $userid = $_GET['uid'];
                            $bookid = $_GET['bid'];
                            $pt = mysqli_query($con, "select * from patient p,booking b where  p.P_id=$userid and b.B_id=$bookid and p.P_id=b.P_id ");
                            $pd = mysqli_fetch_assoc($pt);
                            $dateOfBirth = $pd['P_dob'];
                            $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                            ?>

                            <?php
                            $sel = mysqli_query($con, "select * from priscription p,booking b,medicine m where m.Medi_id=p.Medi_id  and p.B_id=$bookid  and  b.B_id=$bookid  and b.P_id=$userid and b.D_id=$fd[D_id]");
                            $count1 = mysqli_num_rows($sel);
                            if ($count1 > 0) {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">
                                    <table class="table">
                                        <div class="overview-wrap">
                                            <h4>prescription</h4>
                                        </div>
                                        <hr>
                                        <thead class="bg-dark">
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Dosage</th>
                                                <th>Qty</th>
                                                <th></th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($result = mysqli_fetch_array($sel)) {
                                            ?>


                                                <tr>
                                                    <th><?php echo $result['Med_name']; ?></th>
                                                    <th><?php echo $result['meddose']; ?></th>
                                                    <th><?php echo $result['medqty']; ?></th>
                                                    <th><a class="btn btn-danger" href="delprisc.php?uid=<?php echo $userid; ?>&bid=<?php echo $bookid; ?>&prisc=<?php echo $result['med_id']; ?>">Delete</a></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><?php
                                    } else {
                                        ?>
                                <span>nothing added yet</span>
                            <?php
                                    }
                            ?>

                            <!-- table -->

                            <div class="container col-lg-6">

                                <div class="overview-wrap">
                                    <h2 class="title-1">prescription</h2>
                                </div>
                                <hr><br>


                                <div class="card col-12" style="border-radius:25px;padding:25px;">

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
                                    <h4>prescribe</h4>
                                    <br>
                                    <form method='POST' action='prisc.php'>
                                        <table class="table  table-hover col-12 ">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Quantity</th>
                                                    <th> </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl">
                                                <?php
                                                $med = mysqli_query($con, "select * from medicine");

                                                ?>
                                                <tr>
                                                    <td><select class="form-control" name='medname' required>
                                                            <?php
                                                            while ($m = mysqli_fetch_array($med)) {
                                                            ?>
                                                                <option value="<?php echo $m['Medi_id'];  ?>"><?php echo $m['Med_name'];  ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control" type='text' name='dosage' required></td>
                                                    <td><input class="form-control" type='text' name='qnty' required></td>
                                                    <td><input class="form-control" type='hidden' name='bookid' value="<?php echo $bookid;  ?>" required>
                                                        <input class="form-control" type='hidden' name='uid' value="<?php echo $userid ?>" required>
                                                    </td>

                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan='4' style='text-align:right;'><input type='submit' name='save' class="btn btn-primary" value='Save Details'></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>



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


} else {

    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}

?>