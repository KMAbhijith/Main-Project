<?php
include "connect.php";
if (isset($_POST['updatedetails'])) {
    $pid = $_POST["pid"];
    $lid = $_POST["lid"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE patient SET   P_phone='$phone' WHERE P_id='$pid' ";
    $res = mysqli_query($con, $sql);


    if ($res) {
        if (mysqli_query($con, "UPDATE  `login`  SET   Username='$email' WHERE Log_id='$lid'")) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="pages-profile.php?e=1"</script>');
            } else {
                header("location:pages-profile.php?e=1");
                die();
            }
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