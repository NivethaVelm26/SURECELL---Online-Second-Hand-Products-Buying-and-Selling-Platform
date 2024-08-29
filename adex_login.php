<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> LOGIN | BUY & SELL</title>
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
        padding-top: 30px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size: 40px;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 25px;
}

.box {
		width: 470px;
		height: 500px;
		background-color: #fff;
		border: 3px solid #d510fc;
		border-radius: 15px;
        margin-left:640px;
        margin-top:100px;
	}

    .username{
        border-color:#d52cff;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:35px;
        font-family: lato, sans-serif;
        margin-left:61px;
        margin-top:40px;
        font-size: 20px;
    }

    .password{
        border-color:#d52cff;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:35px;
        font-family: lato, sans-serif;
        margin-left:61px;
        margin-top:20px;
        margin-bottom: 40px;
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
        background-color: #ea82ff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    .box-button2 {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ea82ff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        margin-left:50px;
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #efbaff;
}

.box-button2:hover {
    background-color: #efbaff;
}
</style>

<body>
    <div class="box">
        <h2 class="head">ADMIN/EXPERT LOGIN</h2>
        <div class="login">
        <form action="login_check.php" method="post">
            <input type="text" name="username" class="username" placeholder="username">
            <input type="password" name="password" class="password" placeholder="password">
        </div>
        <button type="submit" class="box-button2">LOGIN</button>
        </form>
        <button class="box-button" onclick="register()">REGISTER</button>
    </div>
    <script>
		function register() {
			window.location.href = "register.html"; 
        }
	</script>
    
</body>