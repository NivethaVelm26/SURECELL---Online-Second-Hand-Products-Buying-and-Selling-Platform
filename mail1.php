</php

$to = "nivethavelm26@gmail.com";
$subject = "Test email";
$message = "This is a test email.";
$headers = "From: py01tester@gmail.com\r\n" .
           "Reply-To: py01tester@gmail.com\r\n" .
           "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully";
} else {
    echo "Email sending failed";
}

?>