<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $pid = $_POST["id"];

    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE doctor SET  D_email = '$email' , D_phone='$phone' WHERE D_id='$pid' ";
    $res = mysqli_query($con, $sql);


    if ($res) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="docprofile.php?e=1"</script>');
        } else {
            header("location:docprofile.php?e=1");
            die();
        }
    } else {
?>
        <script>
            alert("error occuered");
        </script>
<?php
    }
}
?>