<?php

require_once('db.php');
session_start();
$uid = $_SESSION['userid'];
$query = "SELECT * FROM `verification` INNER JOIN login on verification.ex_id=login.user_id where email='$uid' and status='waiting'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
// $num = mysqli_num_rows($result);
if(isset($row['p_id'])){
$prod = $row['p_id'];
$query1 = "SELECT * FROM `product` where p_id='$prod'";
$result1 = mysqli_query($conn,$query1);
$num = mysqli_num_rows($result1);
// $row1 = mysqli_fetch_array($result1);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <title> VERIFICATION | EXPERT</title>
    <!-- favicon -->
    <link rel="icon" href="img/buysellicon.jpg" type="image" sizes="16x16">
    <!-- header links -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="js/jQuery3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
</head>

<style>
    /* Set the background color of the page */
    body {
        background-color: #ffffff;
        margin: 0;
        padding: 0;
        height: 100%;
        overflow-y: auto;
}

    /* Style for the "Hi" element */
    .head
    {
        width: 90%;
        margin: auto;
        padding-left:10px;
        padding-top: 30px;
        padding-bottom: 10px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size:20px;
    }

    .content{
        display:flex;
        flex-direction:column;
        padding-top: 20px;
    }

    .image {
            height:50%;
            width:50%;
            display:flex;
        }

    img{
            border-radius: 20px !important;
    }

    .deets {
			background-color: #f6faff; /* Change color as needed */
			height: 60px;
            width:270px;
            border-color:black;
			border-radius: 25px; /* Adjust radius as needed */
			color: rgb(0, 0, 0);
			text-align: center;
			font-size: 24px;
			font-weight: bold;
            margin-top:20px;
		}

        .name{
            padding-top:20px;
        }

        .price{
            padding-top:10px;
        }

    /* Style for the footer */
    footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: RELATIVE;
            left: 0;
            margin-top:80px;
            bottom: 0;
            width: 100%;
        }

        .col{
            display:flex;
            flex-direction: column;
        }

        .row{
            display:flex;
            flex-direction: row;
            padding-left: 90px;
        }

        .box-btn {
        padding: 10px 20px;
        font-size: 18px;
        width:270px;
        font-weight: bold;
        margin-top:20px;
        background-color: #45bbff;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


.box-btn:hover {
    background-color: #ffaae3;
}
</style>

<body>
    <!-- HEADER -->
    <div id="1"></div>
    <script>
        load("expertheader.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(1).innerHTML = req.responseText;
        }
    </script>
    <div class="head">
        <h1><b>AD VERIFICATION REQUESTS:</b> </h1>
    </div>
    <div class="content">
        <div class="row">
            <?php
            if(isset($num)){
                while($row1 = mysqli_fetch_array($result1))
                {
                ?>
                <div class="col">
                    <div class="image">
                        <img src="img/<?php echo $row1['img_path']?>.jpg">
                    </div>
                    <div class="deets">
                        <div class="name"><?php echo $row1['p_name']?></div>
                    </div>
                    <?php $pid = $row1['p_id']?>
                    <div class="btn" onclick="location.href='expertreview.php?ID=<?php echo $pid?>'">
                        <button class="box-btn" >REVIEW PRODUCT</button>
                    </div>
                </div>
                <?php
                }
                }
            else{
            ?>
                <h1>No tasks assigned.</h1>
            <?php
            }
            ?>
        </div>
    </div>
        <!-- FOOTER -->
    <div id="4"></div>
    <script>
        load("expertfooter.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(4).innerHTML = req.responseText;
        }
    </script>
    <script>
		function viewprod() {
			window.location.href = "product.html"; 
        }
	</script>
</body>

