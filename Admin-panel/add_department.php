<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $dept = $_POST['username'];

    $query = "select * from department where Dept_name='$dept'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);

        $count = $row['Dept_name'];

        if (mysqli_num_rows($result) > 0) {
            $response = "<span style='color: red;'>Not Available.</span>";
        }
    } else {
        $response = "<span style='color: green;'>Available.</span>";
    }

    echo $response;
    die;
}

if (isset($_POST['submit'])) {
    $dept = $_POST['department'];
    $dept_about = $_POST['about'];
    $filename1 = $_FILES["doc"]["name"];
    $tempname1 = $_FILES["doc"]["tmp_name"];
    $folder1 = "images/" . $filename1;

    $sql = "SELECT * FROM department WHERE Dept_name='$dept'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
        } else {
            header("location:manage.php?e=1");
            die();
        }
    } else {
        $query = "INSERT INTO department (Dept_name,Dept_pic,Dept_about) VALUES ('$dept', '$filename1','$dept_about')";
        if (mysqli_query($con, $query)) {
            move_uploaded_file($tempname1, $folder1);
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
