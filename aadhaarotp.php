<?php

session_start();

include "db.php";
include "mail_credentials.php";
    
$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'se_project');

$num = $_POST['number'];
$name = $_POST['name'];

$query = "SELECT * FROM user WHERE aadhaar_num = '$num'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// otp validation through email
$otp = rand(100000, 999999);

// $sql = "INSERT INTO user (otp) VALUES ('$otp')";

// using the PHPMailer module
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

try {
    // $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASSWORD;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL, 'SURECELL');
    $mail->addAddress($row['email']);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Verification OTP';
    $mail->Body    = 'Hello '.$name . ', your OTP Verification code for Aadhaar Verification is:  <b>' . $otp . '</b>';
    $mail->AltBody = 'Your OTP Verification code is: ' . $otp;

    $mail->send();
        $message = 'Message has been sent to ' . ($row['email']);
}

catch (Exception) 
{
    $message ="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo '<script>alert("' . $message . '");</script>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> AADHAAR VERIFICATION</title>
    <!-- favicon -->
    <link rel="icon" href="img/buysellicon.jpg" type="image" sizes="16x16">
    <!-- EXTERNAL LINKS -->
    <link rel="stylesheet" href="css/header.css">
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <script>
        function verify() {
            var otp = document.getElementById("otp").value;
            if (<?php echo $otp; ?> == otp) {
            alert("Your AADHAAR NUMBER is verified");
            } 
            else {
            alert("Your Aadhaar number/OTP is invalid");
            }
        }
    </script>

</head>

<style>
    body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: lato, sans-serif;
            overflow-y: auto;
}

.head{
        margin: auto;
        padding-left:10px;
        padding-top: 20px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size: 40px;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 25px;
}

.box {
		width: 500px;
		height: 500px;
		background-color: #fff;
		border: 3px solid #ff478e;
		border-radius: 15px;
        margin-left:640px;
        margin-top:60px;
	}

    #otpbox {
		width: 500px;
		height: 150px;
		background-color: #fff;
		border: 3px solid #ff478e;
		border-radius: 15px;
        margin-left:640px;
        margin-top:250px
	}

    .number{
        border-color:#ff478e;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:30px;
        font-family: lato, sans-serif;
        margin-left:90px;
        margin-top:40px;
        font-size: 20px;
    }

    .name{
        border-color:#ff478e;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:30px;
        font-family: lato, sans-serif;
        margin-left:90px;
        margin-top:20px;
        margin-bottom: 20px;
        font-size: 20px;
    }

    #otp{
        border-color:#ff478e;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:30px;
        font-family: lato, sans-serif;
        margin-left:90px;
        margin-top:20px;
        margin-bottom: 10px;
        font-size: 20px;
    }

    button {
        float:left;
        margin-top:20px;
        margin-left: 110px;

    }

    .box-button {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ff478e;
        color: white;
        border: none;
        border-radius: 25px;
        margin-left:220px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    .box-button2 {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ff478e;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        margin-left:200px;
        margin-bottom:5px;
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #ffbbd5;
}

.box-button2:hover {
    background-color: #ffbbd5;
}

.back{
    float:left;
    padding-left:520px;
    padding-bottom:500px;
    font-size:20px;
}

</style>

<body>
    <a class="back" href="aadhaar.php"><h4><i class="fa fa-backward" aria-hidden="true">Back</i></h4></a>
    <div id="otpbox" >
    <form action="javascript:verify()" method="post">
        <input type="text" name="otp" id="otp" placeholder="6-DIGIT OTP">
        <button class="box-button">VERIFY</button>
    </form>
    </div>
    
</body>
</html>