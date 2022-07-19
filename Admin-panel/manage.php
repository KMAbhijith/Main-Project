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
    <title>Tables</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
    <!--    <link href="css/ajaxvalid.css" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery.min.js"></script>
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
    <script src="http://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>

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

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <!-- nav tab-->
                    <div class="col" style="background-color:white;padding:25px;border-radius:10px;">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Department</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-doctor" role="tab" aria-controls="pills-profile" aria-selected="false">Doctor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-spec" role="tab" aria-controls="pills-contact" aria-selected="false">Specialization</a>
                            </li>
                        </ul>
                        <hr>
                        <!-- nav tab1-->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                <div class=" card col-lg-12">
                                    <div class="card-body ">
                                        <h5 class="text-primary">Add Department</h5>
                                        <hr>
                                        <br>
                                        <form action="add_department.php" class="was-validated" id="fileForm" method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div id="error_msg"></div>
                                                <div class="col-sm-12 text-secondary"><input type="text" name="department" placeholder="Department name" id="department" class="form-control" value="" pattern="[A-Za-z\s]{2,24}" required></div>
                                                <div id="uname_response"></div>

                                            </div>
                                            <div class="row mb-3">
                                                <div id="error_msg"></div>
                                                <div class="col-sm-12 text-secondary"><textarea name="about" placeholder="About" id="department" class="form-control" value="" pattern="[A-Za-z1-9\s]{2,10000}" required></textarea></div>

                                                <div class="invalid-feedback"> invalid form feedback</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" class="form-control" id="docm" name="docm" aria-label="file example" accept="image/png, image/gif, image/jpeg" onchange="Checkfilesdept();" required>
                                                <div class="invalid-feedback"> invalid form file feedback</div>
                                                <div> *image only</div>
                                            </div>
                                            <script>
                                                function Checkfilesdept() {
                                                    var fup = document.getElementById('docm');
                                                    var fileName = fup.value;
                                                    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                                                    if (ext == "jpg") {
                                                        return true;
                                                    } else {

                                                        document.getElementById("docm").value = "";
                                                        fup.focus();
                                                        return false;
                                                    }
                                                }
                                            </script>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-12 text-secondary"><input type="submit" class="btn btn-primary px-4" name="submit" id="reg_btn" value="Add Department" /></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="container col-lg-6" style="padding:25px;border-radius:20px;">

                                    <h4>Departments</h4>
                                    <hr><br>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="background-color: black;color:white;">
                                                <th>no</th>
                                                <th>Departments</th>

                                            </tr>
                                        </thead>
                                        <?php $sql = "select * from department";
                                        $qr = mysqli_query($con, $sql);
                                        $i = 1;
                                        while ($r =  mysqli_fetch_array($qr)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $r['Dept_name']; ?> </td>


                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>

                                </div>

                            </div>
                            <!-- nav tab2-->
                            <div class="tab-pane fade" id="pills-doctor" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <div class="card" style="padding:20px;">
                                    <h4>Add Doctor</h4>
                                    <hr>
                                    <form action="add_doctor.php" class="was-validated" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="uname">Name:</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" pattern="[A-Za-z\s]{1,20}" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="uname">Doctor post:</label>
                                            <select id="dpost" class="custom-select" name="dpost" required>
                                                <option value="">Open this select menu</option>
                                                <option value="senoir">Senoir</option>
                                                <option value="junior">Junior</option>
                                                <option value="Practice">Practice</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="uname">Department:</label>
                                            <select id="dept" class="custom-select" name="dept" onchange="change_country();" required>
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
                                            <label for="uname">Specialization:</label>
                                            <select id="spec" class="custom-select" name="spec" required>
                                                <option value="">Open this select menu</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback"> invalid select </div>
                                        </div>


                                        <script>
                                            function change_country() {
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
                                        <script type="text/javascript">
                                            function Checkfiles() {
                                                var fup = document.getElementById('license');
                                                var fileName = fup.value;
                                                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                                                if (ext == "pdf") {
                                                    return true;
                                                } else {

                                                    document.getElementById("license").value = "";
                                                    fup.focus();
                                                    return false;
                                                }
                                            }

                                            function Checkfilesjpg() {
                                                var fup = document.getElementById('pic');
                                                var fileName = fup.value;
                                                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                                                if (ext == "jpg") {
                                                    return true;
                                                } else {

                                                    document.getElementById("pic").value = "";
                                                    fup.focus();
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="license" name="license" accept="application/pdf,application/vnd.ms-excel" onchange="Checkfiles();" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Upload license</label>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">invalid file </div>
                                            </div>
                                            <div id="fileoutput" style="color:red">*pdf only</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="pic" name="pic" accept="image/png, image/gif, image/jpeg" onchange="Checkfilesjpg();" required>
                                                <label class="custom-file-label">Upload photo</label>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid file </div>
                                            </div>
                                            <div id="output" style="color:red">*images only</div>
                                        </div>
                                        <script src="js/filevaid.js"></script>

                                        <div class="form-group">
                                            <label for="uname">Phone:</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter Name" name="phone" pattern="[0-9]{10}" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="uname">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,4}$" onkeyup="emailc();" required>
                                            <div id="uname_response">*if form cant be submitted try agin with another mail.</div>
                                        </div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                        <button type="submit" name="submit" id="Click" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                            <script>
                                $(document).ready(function() {

                                    $("#email").keyup(function() {

                                        var username = $(this).val().trim();

                                        if (username != '' && this.checkValidity() == true) {


                                            $.ajax({
                                                url: 'p-reg.php',
                                                type: 'post',
                                                data: {
                                                    username: username
                                                },
                                                success: function(response) {
                                                    if (response == 0) {
                                                        $("#Click").prop('disabled', true);
                                                        $('#uname_response').html("<span class='text-danger'>Account with this email is aready exsist<span>");
                                                    } else {

                                                        $("#Click").prop('disabled', false);

                                                    }

                                                }
                                            });
                                        } else {
                                            $("#uname_response").html("");

                                        }

                                    });

                                });
                            </script>

                            <!-- nav tab3-->
                            <div class="tab-pane fade" id="pills-spec" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <center>
                                    <div class=" card col-lg-6">
                                        <div class="card-body ">
                                            <h5 class="text-primary">Add Specializations</h5>
                                            <hr>
                                            <br>
                                            <form action="add-spec.php" method="POST">
                                                <div class="form-group">

                                                    <select id="specialize" name="specialize" class="custom-select" required>
                                                        <option value="">Select Department</option>
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
                                                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <div id="error_msg"></div>
                                                    <div class="col-sm-12 text-secondary"><input type="text" name="Specializations" placeholder="Specialization name" id="Specializations" class="form-control" value="" pattern="[A-Za-z\s]{2,24}" required></div>
                                                    <div id="uname_response"></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-12 text-secondary"><input type="submit" class="btn btn-primary px-4" name="submit" id="reg_btn" value="Add Specialization"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </center>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                                <!-- table -->
                                <center>
                                    <div class="container col-lg-6" style="padding:25px;border-radius:20px;">

                                        <h4>Specializations</h4>
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
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="background-color: black;color:white;">
                                                    <th>no</th>
                                                    <th>Specializations</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sp"></tbody>

                                        </table>
                                    </div>
                                </center>
                            </div>
                            <script>
                                function change_dept() {
                                    var deptspec = $("#deptid").val();

                                    $.ajax({
                                        type: "POST",
                                        url: "specialize-table.php",
                                        data: "deptspec=" + deptspec,
                                        cache: false,
                                        success: function(response) {
                                            //alert(response);return false;
                                            $("#sp").html(response);
                                        }
                                    });

                                }
                            </script>
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