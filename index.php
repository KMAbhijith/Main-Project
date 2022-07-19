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

    <link rel="stylesheet" href="user/assets/css/maicons.css">

    <link rel="stylesheet" href="user/assets/css/bootstrap.css">

    <link rel="stylesheet" href="user/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="user/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="user/assets/css/theme.css">


</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> ecareadpro@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">E</span>-care</a>

                <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">

                        </div>

                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"> Home</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/html/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/html/doctors.php">
                                Doctors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/html/blog.php">Health Package</a>
                        </li>
                        <?php if (isset($_SESSION['userid'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="user/Dashboard/html/pages-profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="user/html/logout.php">Logout</a>
                            </li><?php } ?>
                        <?php if (!isset($_SESSION['userid'])) { ?> <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="login.php">Login / Register</a>
                            </li><?php } ?>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-hero bg-image overlay-dark" style="background-image: url(user/assets/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>
                <a href="#" class="btn btn-primary">Let's Consult</a>
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">

                    <?php
                    if (isset($_SESSION['userid'])) {
                    ?>
                        <div class="col-md-4 py-3 py-md-0">
                            <div class="card-service wow fadeInUp">
                                <div class="circle-shape bg-secondary text-white">
                                    <a href="login.php" style="text-decoration:none;color:white;"><span class="mai-chatbubbles-outline"></span></a>
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
                                <a href="user/html/doctors.php" style="text-decoration:none;color:white;"><span class="mai-shield-checkmark"></span></a>
                            </div>
                            <p><span>Book Now</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <a href="user/html/blog.php" style="text-decoration:none;color:white;"> <span class="mai-basket"></span></a>
                            </div>
                            <p><span>Health Packages</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Your Health <br> Center</h1>
                        <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod
                            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                            accusam et
                            justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore
                            eaque porro
                            consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut
                            optio facilis!</p>
                        <a href="about.php" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="user/assets/img/bg-doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Departments</h1>

            <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                <?php
                $qr =  mysqli_query($con, "select *from department");
                while ($r =  mysqli_fetch_array($qr)) {
                ?>

                    <div class="item">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="Admin-panel/images/<?php echo $r['Dept_pic']; ?>" alt="" height="100%">
                                <div class="meta">
                                </div>
                            </div>
                            <div class="body">
                                <p class="text-xl mb-0"><?php echo $r['Dept_name']; ?></p>
                                <span class="text-sm text-grey"><a href="user/html/doc.php?did=<?php echo $r['Dept_id'];  ?>&d=1" style="text-decoration:none">Check-now</a></span>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


            </div>
        </div>
    </div>
    <!--
    <div class="page-section bg-light">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Health packages</h1>
            <div class="row mt-5">
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="../assets/img/blog/blog_1.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">List of Countries without Coronavirus
                                    case</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="../assets/img/person/person_1.jpg" alt="">
                                    </div>
                                    <span>Roger Adams</span>
                                </div>
                                <span class="mai-time"></span> 1 week ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="../assets/img/blog/blog_2.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">Recovery Room: News beyond the
                                    pandemic</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="../assets/img/person/person_1.jpg" alt="">
                                    </div>
                                    <span>Roger Adams</span>
                                </div>
                                <span class="mai-time"></span> 4 weeks ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="../assets/img/blog/blog_3.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">What is the impact of eating too much
                                    sugar?</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="../assets/img/person/person_2.jpg" alt="">
                                    </div>
                                    <span>Diego Simmons</span>
                                </div>
                                <span class="mai-time"></span> 2 months ago
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="blog.html" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>
    </div> <!-- .page-section -->

    <!--
    <div class=" page-section">
        <center>
            <h1 style="margin-bottom:60px;">Lab facilities</h1>
        </center>
        <div class="container" style="display:flex;">

            <div class="card" style="width: 30rem; margin-left: 60px;">
                <img src="../assets/img/department/cardiology.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

            <div class="card" style="width: 30rem;margin-left: 80px;">
                <img src="../assets/img/department/cardiology.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card" style="width: 30rem;margin-left: 80px;">
                <img src="../assets/img/department/cardiology.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <center><button type="button" class="btn btn-success rounded-pill col-6" style="margin-top:50px;">More</button>
        </center>
    </div>-->
    <!-- <div class="page-section banner-home bg-image"
        style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
            </div>
        </div>
    </div>
    </div> -->



    <?php include "user/html/footer.php" ?>

    <script src="user/assets/js/jquery-3.5.1.min.js"></script>

    <script src="user/assets/js/bootstrap.bundle.min.js"></script>

    <script src="user/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="user/assets/vendor/wow/wow.min.js"></script>

    <script src="user/assets/js/theme.js"></script>



</body>

</html>