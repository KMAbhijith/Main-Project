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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">About Us</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <?php
                    if (isset($_SESSION['userid'])) {
                    ?>
                        <div class="col-md-4 py-3 py-md-0">
                            <div class="card-service wow fadeInUp">
                                <div class="circle-shape bg-secondary text-white">
                                    <a href="../../login.php" style="text-decoration:none;color:white;"><span class="mai-chatbubbles-outline"></span></a>
                                </div>
                                <p><span>Login</span> to explore more</p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <a href="doctors.php" style="text-decoration:none;color:white;"><span class="mai-shield-checkmark"></span></a>
                            </div>
                            <p><span>Book Now</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <a href="blog.php" style="text-decoration:none;color:white;"> <span class="mai-basket"></span></a>
                            </div>
                            <p><span>Health Packages</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 wow fadeInUp">
                        <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
                        <div class="text-lg">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero
                                nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure
                                explicabo aut consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut
                                maxime! Tenetur aperiam maxime iure explicabo aut consequuntur.</p>
                            <p>Expedita iusto sunt beatae esse id nihil voluptates magni, excepturi distinctio impedit illo,
                                incidunt iure facilis atque, inventore reprehenderit quidem aliquid recusandae. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Laudantium quod ad sequi atque accusamus
                                deleniti placeat dignissimos illum nulla voluptatibus vel optio, molestiae dolore velit iste
                                maxime, nobis odio molestias!</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php" ?>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>