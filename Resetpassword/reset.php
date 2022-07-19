<?php
session_start();
include('connect.php');
?>

<head>
    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <br>
    <center>
        <div class="col-6">
            <form class="form-control col-4" action="reset.php" method="POST" style="padding: 25px;border-radius:15px;">
                <h4>Reset Password</h4>
                <hr>
                <br>

                <div class="input-group has-validation">
                    <span class="input-group-text " id="inputGroup-sizing-default">Password</span>
                    <input type="password" id="pass" class="form-control" name="password" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required />
                    <span class="input-group-text " id="inputGroup-sizing-default"><i class="bi bi-eye" id="togglePassword" onclick="myFunction()"></i></span>
                    <div class="invalid-feedback">
                        Must contain at least one number and one uppercase and lowercase letter, and
                        more characters 8 to 16.
                    </div>
                </div>
                <br>


                <div class="input-group has-validation">
                    <span class="input-group-text spw" id="inputGroup-sizing-default">Confirm
                        Password</span>
                    <input type="password" id="pass1" class="form-control" name="password1" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required /> <span class="input-group-text " id="inputGroup-sizing-default"><i class="bi bi-eye" id="togglePassword" onclick="myFunction1()"></i></span>
                    <div class="invalid-feedback">
                        password dosn't match
                    </div>
                </div>
                <br>

                <input type="submit" id="Click" class="col-lg-12 btn btn-secondary  col-12" name="update" value="Reset">
            </form>
        </div>
    </center>
    <script>
        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction1() {
            var x = document.getElementById("pass1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
<?php
if (isset($_POST['update'])) {
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];

    if (mysqli_query($con, "update login set Password=md5('$pass') where  Username='$_SESSION[email]'")) {
        unset($_SESSION['email']);
        header('location:../login.php');
    }
}
?>