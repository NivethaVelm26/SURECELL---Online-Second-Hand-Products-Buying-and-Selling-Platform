<?php

require_once('db.php');

$query = "select * from applicants where id={$_GET['ID']}";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SIGN UP | BUY & SELL</title>
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
        padding-left:60px;
        padding-top: 20px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size: 40px;
        margin-top: 20px;
        margin-bottom: 25px;
}

.box {
		width: 1600px;
		height: 650px;
		background-color: #fff;
		border-radius: 15px;
        margin-left:90px;
        margin-top:80px;
	}

    footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position:fixed;
            left: 0;
            bottom: 0 !important;
            width: 100%;
            margin-top:60px;
        }

    .row{
        margin-left:90px;
        margin-top:40px; 
    }
    
    .col{
        margin-bottom:30px;
    }

    .firstname{
        border-color:#d52cff;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:35px;
        font-family: lato, sans-serif;
        font-size: 20px;
    }

    .lastname{
        border-color:#d52cff;
        height:40px;
        width:310px;
        border-radius:20px;
        padding-left:35px;
        margin-left:20px;
        font-family: lato, sans-serif;
        font-size: 20px;
    }

    button {
        float:left;
        margin-top:20px;
        margin-left: 110px;

    }

    .box-button {
        padding: 15px 25px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ea82ff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .image {
            height: 300px;
            width: 300px;
            padding-left: 60px;
            padding-top: 1px;
            display:flex;
            flex-direction: column;
        }

    img{
        border: 2px solid #d52cff;
            border-radius: 190px !important;
    }

    .imgbtn{
        height:20px;
        width:200px;
        padding-top:40px;
    }

    .box-button2 {
        padding: 15px 25px;
        font-size: 18px;
        font-weight: bold;
        background-color: #4dff73;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        margin-left:50px;
        margin-bottom:50px;
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #efbaff;
}

.box-button2:hover {
    background-color: #c3ffbb;
}

.content{
    display: flex;
    flex-direction: row;
    margin-top:70px;
    margin-left:60px;
}

.btn{
    float:right;
    margin-right:110px;
    margin-top:1px;
}

.imgbtn{
    padding-top:40px;
    padding-left:45px;
}

.aid{
        border-color:#d52cff;
        height:40px;
        width:80px;
        border-radius:20px;
        padding-left:35px;
        margin-left:20px;
        font-family: lato, sans-serif;
        font-size: 20px;
}

</style>

<body>
    <!-- HEADER -->
    <div id="1"></div>
    <script>
        load("adminheader.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(1).innerHTML = req.responseText;
        }
    </script>
        <h2 class="head">EXPERT REGISTRATION</h2>
        <div class="content">
            <div class="image">
                <img src="img/<?php echo $row['img']?>.jpg">
                <form class="uploadbtn">
                    <input class="imgbtn" type="file" name="myfile">
                </form>
            </div>
            <form action="newexpertinsert.php" method="post">
            <div class="deets">
                <div class="row">
                    <div class="col">
                        <input type="text" name="ex_id" class="firstname" placeholder="EXPERT ID">
                        <input type="text" name="pass" class="lastname" placeholder="SET A PASSWORD">
                        <input type="text" name="aid" class="aid" value="<?php echo $row['id']?>">
                    </div>
                    <div class="col">
                        <input type="text" name="role" class="firstname" placeholder="ROLE = Expert" value="Expert">
                        <input type="text" name="name" class="lastname" value="<?php echo $row['name']?>">
                    </div>
                    <div class="col">
                        <input type="text" name="qualification" class="firstname" value="<?php echo $row['qual']?>">
                        <input type="text" name="spec" class="lastname" value="<?php echo $row['spec']?>">
                    </div>
                    <div class="col">
                        <input type="text" name="email" class="firstname" value="<?php echo $row['email']?>">
                        <input type="text" name="num" class="lastname" value="<?php echo $row['phone']?>">
                    </div>
                    <div class="col">
                        <input type="text" name="lang" class="firstname" value="<?php echo $row['lang']?>">
                        <input type="text" name="location" class="lastname" value="<?php echo $row['loc']?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn">
            <button class="box-button2">CREATE</button>
        </div>
        </form>
        
    </div>
       <!-- FOOTER -->
       <div id="4"></div>
       <script>
           load("adminfooter.html");
           function load(url)
           {
               req = new XMLHttpRequest();
               req.open("GET", url, false);
               req.send(null);
               document.getElementById(4).innerHTML = req.responseText;
           }
       </script>
    <script>
		function login() {
			window.location.href = "login.html"; 
        }
	</script>
    
</body>