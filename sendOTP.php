
    <?php

            require_once "phpmailer/PHPMailerAutoload.php"; // Include the PHPMailer library  

            $mail = new PHPMailer;

            // $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'py01tester@gmail.com';                 // SMTP username
            $mail->Password = 'testerpy01';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->setFrom('py01tester@gmail.com', 'Puducherry Technological University');
            $mail->addAddress('nivetha26@gmail.com');     // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Verification OTP';
            $mail->Body    = 'Your OTP Verification code is:  <b>' . $otp . '</b>';
            $mail->AltBody = 'Your OTP Verification code is: ' . $otp;

            if (!$mail->send()) {
                // no mail is sent
                // echo 'Message could not be sent.';
                // echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $_SESSION['otp_sent'] = "OTP sent to your registered email.";
            }

?>
