<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
                            <a class="nav-link" href="../../index.php"> Home</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctors.php">
                                Doctors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Health Package</a>
                        </li>
                        <?php if (isset($_SESSION['userid'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../Dashboard/html/pages-profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="logout.php">Logout</a>
                            </li><?php } ?>
                        <?php if (!isset($_SESSION['userid'])) { ?> <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="/E-care/login.php">Login / Register</a>
                            </li><?php } ?>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>
</body>

</html>