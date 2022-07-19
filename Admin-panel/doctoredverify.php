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
                        <?php
                        $vfy = mysqli_query($con, "select * from doctor d,department dep,specializations spec,imr i,statemedicalcouncil smc,doctoreducation de  where d.D_specialization_id=spec.D_specialization_id and d.Dept_id=dep.Dept_id and i.D_id=d.D_id and i.SMC_id=smc.SMC_id and de.D_id=d.D_id and de.De_status='0'");

                        ?>

                        <!-- table -->
                        <center>
                            <div class="container col-lg-6" style="padding:25px;border-radius:20px;">


                        </center><br>
                        <div class="container">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: black;color:white;">
                                        <th>no</th>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>IMR number </th>
                                        <th>State Medical Council</th>
                                        <th>Qualification</th>
                                        <th>Verify</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $j = 1;
                                    while ($res = mysqli_fetch_array($vfy)) {

                                        echo "<tr><td>" .  $j++ . "</td><td>" . $res['D_name'] . "</td><td> " . $res['D_specializations'] . "</td><td> " . $res['IMR_number'] . "</td><td> " . $res['SMC_name'] . "</td><td> " . $res['D_edu_qualification'] . "</td><td><a href='Qualification.php?id=" . $res['D_edu_id'] . "' class='btn btn-primary'>Verify</a></td></tr>";
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>


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