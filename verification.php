<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

$mail = new PHPMailer(TRUE);    

// Set SMTP server configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

// Set your Gmail account credentials
$mail->Username = 'py01tester@gmail.com';
$mail->Password = 'testerpy01';

// Set email details
$mail->setFrom('your-gmail-account@gmail.com', 'Your Name');
$mail->addAddress('recipient-email@example.com', 'Recipient Name');
$mail->Subject = 'Subject of the Email';
$mail->Body    = 'Content of the Email';

// Send the email
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
