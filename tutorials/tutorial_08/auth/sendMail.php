<?php
    require_once('../vendor/autoload.php');
    require_once('../connect.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //session_start();
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $token = "token_" . uniqid();

        $sql = "INSERT INTO otplinks (email_address, otcode, expired) VALUES ('$email', '$token', 'NO');";
        //echo $sql;
        //exit();
        if (!$conn->query($sql)) {
            echo "Error" . $conn->error;
            exit();
        }
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'croxx000@gmail.com';
            $mail->Password = 'ttjqzghknirupmxj'; //USE App Passwords
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('croxx000@gmail.com', 'Than Hla Oo');
            $mail->addAddress($email);
            $url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/comfirmPass.php?token=$token&email=$email";
            $mail->isHTML(true);
            $mail->Subject = "Reset Password Link";
            $mail->Body = "<h1> You Requested reset password link </h1>
                            Click  <a href='{$url}'>this link </a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo "Message has been sent";
        } catch (Exception $e) {
            echo "Message Could not be send!.Mailer Error: $mail->ErrorInfo";
        }
    }
