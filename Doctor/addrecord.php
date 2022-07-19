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
                            $sel = mysqli_query($con, "select * from medrecord m,booking b where m.date >= CURDATE() and m.B_id=b.B_id  and b.P_id=$userid and b.D_id=$fd[D_id]");
                            $count1 = mysqli_num_rows($sel);
                            if ($count1 > 0) {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">
                                    <table>
                                        <div class="overview-wrap">
                                            <h4>Record</h4>
                                        </div>
                                        <hr>

                                        <?php
                                        $result = mysqli_fetch_assoc($sel)
                                        ?>
                                        <tr>
                                            <th>Title</th>
                                            <th><?php echo $result['title']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Discription</th>
                                            <th><?php echo $result['discription']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Precuation</th>
                                            <th><?php echo $result['precuation']; ?></th>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } else {


                            ?>
                                <!-- table -->

                                <div class="container col-lg-6">

                                    <div class="overview-wrap">
                                        <h2 class="title-1">Priscribtion</h2>
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
                                        <h4>Record</h4>
                                        <br>
                                        <form method='POST' action='addrcrd.php'>

                                            <input class="form-control" type=' text' name='title' placeholder="Symptom" required><br>
                                            <textarea class="form-control" type='text' name='dremark' placeholder="Diagnosis" required></textarea><br>
                                            <input class="form-control" type='text' name='remarks' placeholder="precuations" required><br>
                                            <input class="form-control" type='hidden' name='bookid' value="<?php echo $bookid;  ?>" required>
                                            <input type='submit' name='submit' class="btn btn-primary" value='Save Details'>


                                        </form>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            $sel1 = mysqli_query($con, "select * from referal r,booking b,department de,doctor d where r.date >= CURDATE() and r.B_id=b.B_id  and b.P_id=$userid and b.D_id=$fd[D_id] and  b.D_id=d.D_id and d.Dept_id=de.Dept_id");
                            $count2 = mysqli_num_rows($sel1);
                            if ($count2 <= 0) {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">
                                    <div class="card-body">

                                        <form class="was-validated" method="POST" action="refer.php">
                                            <h4>Referal</h4>
                                            <hr>
                                            <div class="form-group">
                                                <label for="uname">Department:</label>
                                                <select id="dept" class="custom-select" name="dept" onchange="change_dept();" required>
                                                    <option value="">Open this select menu</option>
                                                    <?php
                                                    $qr =  mysqli_query($con, "select *from department");
                                                    while ($r =  mysqli_fetch_array($qr)) {
                                                    ?>
                                                        <option value=" <?php echo $r['Dept_id']; ?>"><?php echo $r['Dept_name']; ?></option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid select </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="uname">Doctor</label>
                                                <select id="spec" class="custom-select" name="spec" required>
                                                    <option value="">Open this select menu</option>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid select </div>
                                            </div>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                            <script>
                                                function change_dept() {
                                                    var country = $("#dept").val();

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "spec.php",
                                                        data: "country=" + country,
                                                        cache: false,
                                                        success: function(response) {
                                                            //alert(response);return false;
                                                            $("#spec").html(response);
                                                        }
                                                    });

                                                }
                                            </script>
                                            <div class="form-group">
                                                <label for="validationTextarea" class="form-label">Remarks</label>
                                                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Remarks" name="remark" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter Remarks.
                                                </div>
                                            </div>
                                            <input class="form-control" type='hidden' name='bookid' value="<?php echo $bookid;  ?>" required>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="card" style="border-radius:25px;padding:25px;">
                                    <table>
                                        <div class="overview-wrap">
                                            <h4>Refered</h4>
                                        </div>
                                        <hr>

                                        <?php
                                        $result1 = mysqli_fetch_assoc($sel1)
                                        ?>
                                        <tr>
                                            <th>Doctor</th>
                                            <th><?php echo $result1['D_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Department</th>
                                            <th><?php echo $result1['Dept_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Remarks</th>
                                            <th><?php echo $result1['remarks']; ?></th>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>

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
<?php } else {

    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}
?>