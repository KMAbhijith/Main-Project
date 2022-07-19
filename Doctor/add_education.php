<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $dept = $_POST['qa'];
    $did = $_POST['did'];
    $sql = "SELECT * FROM doctoreducation WHERE D_edu_qualification='$dept' and D_id='$did'";
    $results = mysqli_query($con, $sql);

    if (mysqli_num_rows($results) > 0) {
?> <script>
            alert("already added");
        </script>
<?php

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
        } else {
            header("location:manage.php?e=1");
            die();
        }
    } else {
        $query = "INSERT INTO doctoreducation (	D_edu_qualification,D_id) VALUES ('$dept','$did')";
        if (mysqli_query($con, $query)) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
        exit();
    }
}
