<?php
session_start();
include "connect.php";
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



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
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
                <h1 class="font-weight-normal">Our Doctors</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->
    <div class="card">
        <div class="page-section bg-light">

            <div class="container col-lg-8" style="padding:25px;border-radius:20px;">

                <h4>Doctors</h4>
                <hr><br>
                <form action="specialize-table.php" method="POST">
                    <div class="form-group">

                        <select id="deptid" class="custom-select" onchange="change_dept();" required>
                            <option value="">Select a Department</option>
                            <?php
                            $qr =  mysqli_query($con, "select *from department");
                            while ($r =  mysqli_fetch_array($qr)) {
                            ?>
                                <option value=" <?php echo $r['Dept_id']; ?>"><?php echo $r['Dept_name']; ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>
                </form><br>

            </div>
            </center>



        </div>

        <div class="page-section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row" id="sp">