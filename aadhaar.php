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
        margin-top:20px
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

    .otp{
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

</style>

<body>
    <div class="box">
        <h2 class="head">AADHAAR VERIFICATION</h2>
        <div class="aadharverify">
            <form action="aadhaarotp.php" method="post">
                <input type="text" name="number" class="number" placeholder="12-DIGIT AADHAAR NUMBER">
                <input type="text" name="name" class="name" placeholder="FULL NAME">
                <button type="submit" class="box-button2">SEND OTP</button>
            </form>
        </div>
    </div>

</body>
</html>