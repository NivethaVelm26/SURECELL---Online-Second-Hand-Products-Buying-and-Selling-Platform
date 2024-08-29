<?php
session_start();

include "db.php";
include "mail_credentials.php";

//Create a PDO instance for the class PDO
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//variables declaration for msg and error messages
$faculty_id = '';
$email = '';
$name = '';
$otp = '';
$opted_result = '';
$invalid_id_err = '';
$invalid_opted_result = '';
$invalid_otp_err = '';
$otp_sent = '';


// if user email is not found in the faculty_det table
if (isset($_SESSION['invalid']) && $_SESSION['invalid'] === true) {
    $_SESSION['invalid'] = false;
    echo "<script>
                    alert('Your Email is not registered for " .  $_SESSION['opted_result']  . ");
         </script>
            ";
}

// to send OTP
if (isset($_POST["send_otp"])) {

    // storing the email
    $email = filter_input(INPUT_POST, 'reg_no', FILTER_SANITIZE_SPECIAL_CHARS);
    $opted_result = filter_input(
        INPUT_POST,
        'examination',
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    // getting the corressponding faculty_id from DB for the email id
    $get_faculty_id = "SELECT `faculty id`,`faculty name`, `email` FROM `faculty_det` WHERE `email` = ?";
    $stmt = $pdo->prepare($get_faculty_id);
    $stmt->execute([$email]);
    $result = $stmt->fetch();

    // if email is found in the DB
    if (!empty($result)) {
        
            
            $name = $result->faculty_name;
            $email = $result->email;
            echo $email . "<br>";

            // otp validation through email
            $otp = rand(100000, 999999);
            echo $otp . "<br>";

            // using the PHPMailer module
            require 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            // $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASSWORD;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Puducherry Technological University');
            $mail->addAddress($email);     // Add a recipient

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


            //session variables
            $_SESSION['otp'] = $otp;
            $_SESSION['reg_no'] = $reg_no;
            $_SESSION['opted_result'] = $opted_result;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['invalid_otp_err'] = '';
            $_SESSION['set_timer'] = true;

            header("Location: " . $_SERVER['PHP_SELF']);
            return;
        } else {
            $invalid_opted_result = '*required';
        }
    }
    //if email is not found in the DB
    else {
       
    }


//when user submits the get Result btn
if (isset($_POST["submit"])) {
    $user_otp = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['otp'])) {
        if (intval($user_otp) === $_SESSION['otp']) {
            echo "correct OTP";
            $_SESSION['invalid'] = false;
            header("Location: homepg.php");
        } else {
            unset($_SESSION['reg_no']);
            unset($_SESSION['opted_result']);
            $_SESSION['invalid_otp_err'] = '*Invalid OTP';
        }
    } else {
        unset($_SESSION['reg_no']);
        unset($_SESSION['opted_result']);
        $_SESSION['invalid_otp_err'] = '*Invalid OTP';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEC IIS Portal</title>
    <link rel="stylesheet" href="stylogin.css">

</head>

<body>

    <header>
        <div class="main-header">
            <img src="https://ptuniv.edu.in/images/ptu-logo.png" alt="ptu-logo" class="ptu-logo">
            <div class="section">
                <h1>Puducherry Technological University<h1>
                        <h2>Staff Corner</h2>
                        <h2>FACULTY LOGIN</h2>
            </div>
        </div>
    </header>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label for="reg-value">
                Email ID:
            </label>
            <input type="text" id="reg-value" name="reg_no" value="<?php isset($_SESSION['reg_no']) ? print $_SESSION['reg_no'] : '' ?>">
            <?php if (!empty($invalid_reg_err)) : ?>
                <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $invalid_reg_err ?></p>
            <?php endif ?>
        </div><br>
        <!--
        <div>
            <label for="examination">Choose an examination: </label>
            <select name="examination" id="examination">
                <option value="">--Please choose an option--</option>

                <?php foreach ($list_of_published_results as $result) : ?>
                    <option value="<?php echo $result ?>" <?php if (isset($_SESSION['opted_result'])) {
                                                                ($_SESSION['opted_result'] === $result) ? print " selected" : '';
                                                            }
                                                            ?>><?php echo $result ?></option>
                <?php endforeach ?>
            </select>
            <?php if (!empty($invalid_opted_result)) : ?>
                <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $invalid_opted_result ?></p>
            <?php endif ?>
        </div><br> -->
        <div>
            <label for="otp-value">OTP:</label>
            <input type="number" id="otp-value" name="otp" maxlength="6">
            <input type="submit" name="send_otp" id="send_otp" value="SEND OTP" <?php (isset($_SESSION['set_timer']) && $_SESSION['set_timer'] === true) ? print "disabled" : null;
                                                                                ?>>
        </div>
        <?php if (!empty($otp_sent)) : ?>
            <p style="color:green; font-weight: bold; font-size: .8rem; margin-top: 2px;"><?php echo (isset($_SESSION['otp_sent'])) ? print $_SESSION['otp_sent'] : '' ?></p>
        <?php endif ?>
        <?php if (isset($_SESSION['invalid_otp_err'])) : ?>
            <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $_SESSION['invalid_otp_err'] ?></p>
        <?php endif ?>
        <div class="submit-btn">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <script>
        (function(window, document, undefined) {
            window.onload = init;

            function init() {
                const otpBtn = document.getElementById("send_otp");
                let otpTimer = 15;
                let val;
                if (otpBtn.hasAttribute("disabled")) {
                    val = '' + otpTimer;
                    let time_limit_var = "00:" + val;
                    otpBtn.setAttribute("value", time_limit_var)
                    otpTimer--;
                    let timer = setInterval(() => {
                        if (otpTimer == 0) {
                            clearInterval(timer);
                        } else {
                            if (otpTimer < 10) {
                                val = 0 + '' + otpTimer;
                            } else {
                                val = '' + otpTimer
                            }
                            time_limit_var = "00:" + val;
                            otpBtn.setAttribute("value", time_limit_var)
                            otpTimer -= 1;
                        }
                    }, 1000);
                    setInterval(() => {
                        otpBtn.removeAttribute("disabled");
                        otpBtn.setAttribute("value", "SEND OTP")
                    }, 15000)
                }
            }

        })(window, document, undefined);
    </script>
</body>

</html>