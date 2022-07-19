<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {
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
        <?php
        $ri = $_GET['id'];
        $query = "select * from doctor  where D_id='$ri' ";

        $res = mysqli_query($con, $query);

        $r = mysqli_fetch_array($res);
        $query1 = "select * from department where Dept_id='$r[Dept_id]'";
        $res1 = mysqli_query($con, $query1);
        $d = mysqli_fetch_array($res1);
        $query2 = "select * from specializations where Dept_id='$r[Dept_id]' and D_specialization_id=$r[D_specialization_id]";
        $res2 = mysqli_query($con, $query2);
        $sp = mysqli_fetch_array($res2);

        ?>
        <?php
        $pic = "select Pro_pics from profileimages where Log_id =$r[Log_id] and Utype_id=2 ";
        $check = mysqli_query($con, $pic);
        $fe = mysqli_fetch_array($check);

        $edu = mysqli_query($con, "select * from doctoreducation where D_id='$ri' and De_status=1 ");

        ?>
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
                    <h1 class="font-weight-normal">Book Slots</h1>
                </div> <!-- .container -->
            </div> <!-- .banner-section -->
        </div> <!-- .page-banner -->

        <div class="main-content">
            <div class="section__content section__content--p30" style="margin-top: -20px;">

                <section style="background-color: #eee;border-radius:25px;">
                    <div class="container py-5 col-10">
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="border-radius:25px;">
                                    <h4>Doctor details</h4>
                                </nav>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4" style="border-radius:10px;">
                                    <div class="card-body text-center">
                                        <img src="../../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3"><?php echo $r['D_name']; ?></h5>
                                        <p class="text-muted mb-1">Doctor</p>
                                        <p class="text-muted mb-4">Specialised in&nbsp;<?php echo $sp['D_specializations']; ?><br><?php echo $d['Dept_name']; ?>&nbsp;Department</p>
                                        <hr>
                                        <h5 class="my-3">Qualifications</h5>
                                        <?php
                                        if (mysqli_num_rows($edu) > 0) {
                                            while ($fetch = mysqli_fetch_assoc($edu)) {
                                        ?>
                                                <p class="text-muted mb-1"><?php echo $fetch['D_edu_qualification'];  ?></p>
                                            <?php
                                            }
                                        } else {
                                            ?> <p class="text-muted mb-1">Nothing Added</p>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-8 ">
                                <div class="card mb-4" style="padding:25px;border-radius:10px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $r['D_name']; ?></p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $r['D_phone']; ?></p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $doc1 = mysqli_query($con, "select * from doctor where D_id='$ri'");
                        $d1 = mysqli_fetch_array($doc1);

                        ?>

                        <div class="col-lg-12">
                            <div class="card mb-4" style="padding:25px;border-radius:10px;">
                                <h5><b>Schedule</b></h5>
                                <hr><br>
                                <?php
                                $re = $_SESSION['userid'];
                                $query = "select * from patient where Log_id='$re'";
                                $res = mysqli_query($con, $query);

                                $r = mysqli_fetch_array($res);
                                ?>
                                <?php

                                //  $sql7 = "SELECT W_day,TIME_FORMAT(S_Time,'%r') AS stime,TIME_FORMAT(E_time,'%r') AS etime ,S_id from schedule where  D_id='$ri' group by W_day";
                                $sql7 = "SELECT S_id,W_day,D_id from schedule where  D_id='$ri' and W_day >= CURDATE() ";
                                $sch = mysqli_query($con, $sql7);

                                ?><div style="display:inline;"><?php
                                                                $i = 0;
                                                                while ($sh = mysqli_fetch_array($sch)) {


                                                                ?>
                                        <input type="hidden" name="pid" id="b" value='<?php echo $r['P_id'] ?>'>
                                        <input type="hidden" name="did" id="d" value='<?php echo $ri ?>'>
                                        <button class="btn btn-primary col-2" style="border-radius:10px; margin:15px;" value="<?php echo $sh['S_id'] ?>" onclick="schedule();" id="bs"><?php echo $sh['W_day']; ?></button>

                                    <?php
                                                                    $i++;
                                                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        ?>

                        <div class="col-lg-12">

                            <div class="card col" style="padding:25px;border-radius:10px;">
                                <h5><b>Time Slots</b></h5>
                                <hr>
                                <div id="schd"></div>
                            </div>
                        </div>


                    </div>
                </section>

            </div>
        </div>
        </div>

        <script>
            function schedule() {

                var btnsch = event.target.value;
                var p = $('#b').val();
                var did = $('#d').val();
                $.ajax({
                    type: "POST",
                    url: "schd.php",
                    data: {
                        btnsch: btnsch,
                        uid: p,
                        did: did
                    },
                    cache: false,
                    success: function(response) {
                        //alert(response);return false;
                        $("#schd").html(response);
                    }
                });

            }
        </script>




        <?php include "footer.php" ?>

        <script src="../assets/js/jquery-3.5.1.min.js">
        </script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="../assets/vendor/wow/wow.min.js"></script>

        <script src="../assets/js/theme.js"></script>

    </body>

    </html>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../../login.php?e=1");
        die();
    }
}


?>