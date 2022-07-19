
<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $imr = $_POST['imr'];
    $smc = $_POST['smc'];
    $did = $_POST['did'];
    echo $did;
    echo $smc;
    $query = "INSERT INTO imr(IMR_number,SMC_id,D_id) VALUES ('$imr','$smc','$did')";
    if (mysqli_query($con, $query)) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="docimr.php?e=1"</script>');
        } else {
            header("location:docimr.php?e=1");
            die();
        }
    }
    exit();
}
