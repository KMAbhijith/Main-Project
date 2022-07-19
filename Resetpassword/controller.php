<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);

class Controller
{
    function __construct()
    {
        $this->processEmailVerification();
    }
    function processEmailVerification()
    {
        switch ($_POST["action"]) {

            case "get_otp":
                $email = $_POST['email'];
                $otp = rand(100000, 999999); //generates random otp
                $_SESSION['session_otp'] = $otp;
                $_SESSION['email'] = $email;
                $html = '<html>
       <head>
       <meta charset="utf-8">
       </head>
       <body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4hVvyxHSVWVWGu8Uqq1bOi0x7KAhUG22svA&usqp=CAU" style="background-size: cover;">
           <center>
       <h1 style="margin-top: 50px;">Welcome to E-care</h1>
       <p>Hai,' . $email . '</p>
       <p>Your OTP for password reset request is sharing below. </p>
       Don\'t share the OTP/login credentials to anyone. Enjoy using our website..<br>
       OTP: ' . $otp . '
       <div style="margin-top:30px">
       </center>
       </body>
       </html>';
                include('smtp/PHPMailerAutoload.php');
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "ecareadpro@gmail.com";
                $mail->Password = "kznzkeiyjesxgjua";
                $mail->SetFrom("ecareadpro@gmail.com", 'E-care');
                $mail->addReplyTo('ecareadpro@gmail.com', 'E-care');
                $mail->addAddress($email);
                $mail->IsHTML(true);
                $mail->Subject = "Password reset request for your account";
                $mail->Body = $html;
                $mail->SMTPOptions = array('ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => false
                ));


                try {

                    if ($mail->send()) {
                        require_once('otp-verification.php');
                    }
                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }

                break;

            case "verify_otp":
                $otp = $_POST['otp'];

                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    require_once('reset.php');
                    echo json_encode(array("type" => "success", "message" => "Your Email is verified!"));
                } else {
                    echo json_encode(array("type" => "error", "message" => "Mobile Email verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
