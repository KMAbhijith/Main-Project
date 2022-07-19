<?php
if (isset($_GET['d'])) {


    include "connect.php";

    include "docup.php";
} else {
?>

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


        <script src="../assets/js/jquery-3.5.1.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="../assets/vendor/wow/wow.min.js"></script>

        <script src="../assets/js/theme.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    </head>
<?php
}
?>
<?php
include('connect.php');

if (isset($_GET['d'])) {

    $dept = $_GET['did'];
} else {
    $dept = $_POST['deptspec'];
}
$sql = "select * from doctor d,profileimages i,specializations s,department de where d.Dept_id=$dept and d.Log_id=i.Log_id and i.Utype_id=2 and s.Dept_id=$dept and de.Dept_id=$dept and d.D_specialization_id=s.D_specialization_id";
$query = $con->query($sql);
if (mysqli_num_rows($query) < 1) {
    echo 'nothing found';
}
while ($res = $query->fetch_assoc()) {

    echo ("<div class='col-md-6 col-lg-4 py-3 wow zoomIn'>
        <div class='card-doctor'>
            <div class='header'>
                <img src='../../uploadedimg/$res[Pro_pics] ' style='width:100%;height:100%;' alt=''>
                <div class='meta d-flex justify-content-center'>
                    <a  href='bookslots.php?id=$res[D_id]'><span class='bi bi-journal'></span></a>
                </div>
            </div>
            <div class='body'>
                <p class='text-xl mb-0'>Dr. $res[D_name] </p>
                <span class='text-sm text-grey'> $res[D_specializations] </span>
            </div>
        </div>
    </div>");
}

?>
<?php
if (isset($_GET['d'])) {
    include "docdown.php";
}
?>