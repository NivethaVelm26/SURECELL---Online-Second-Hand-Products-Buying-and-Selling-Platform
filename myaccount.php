<?php

require_once('db.php');
session_start();
$user = $_SESSION['userid'];
$uid = $_SESSION['uid'];
$query = "SELECT * FROM login INNER JOIN user ON login.user_id=user.user_id where login.email='$user'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$query1 = "SELECT *,product.p_id FROM product LEFT JOIN verification ON product.p_id=verification.p_id WHERE product.seller_id='$uid'";
$result1 = mysqli_query($conn,$query1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> MY ACCOUNT </title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="img/buysellicon.jpg" type="image" sizes="16x16">

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
        margin-left: 40px;;
        padding-top: 30px;
        letter-spacing: 2px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .myads
    {
        width: 90%;
        margin-left: 40px;;
        padding-top: 20px;
        padding-bottom:20px;
        letter-spacing: 2px;
        font-weight: 700;
        text-transform: capitalize;
    }


    .content{
        display: flex;
        flex-direction: row;
        padding-left:50px;
    }

    .image {
            height: 250px;
            width: 250px;
            padding-left: 40px;
            padding-top: 20px;
            display:flex;
        }

    img{
            border-radius: 20px !important;
    }

    .details{
        display: flex;
        flex-direction: column;
    }

    .name{
        padding-left:80px;
        padding-top:20px;
    }

    .email{
        padding-left:80px;
        margin-top:0%;
    }

    .phone{
        padding-left:80px;
        margin-top:0%;
    }

    .create{
        padding-left:80px;
    }

    .ads{
        padding-bottom:100px;
    }

    .loca {
            background-image:url("img/loc1.jpg");
			height: 150px;
            width:300px;
			border-radius: 25px; /* Adjust radius as needed */
			color: rgb(0, 0, 0);
			text-align: center;
			font-size: 24px;
			font-weight: bold;
            margin-left:90px;
            margin-top:50px;
		}

        .location{
            padding-top:10px;
        }

        .map{
            font-size: 30px;
            color: #73ff7f;
            padding-top:20px;
        }

        hr {
            border: 5px ;
            border-top: 2px solid rgb(36, 0, 0);
            height: 2px;
            margin-top:30px;
}

.rectangle{
	display: flex;
	flex-direction: row;
	height: 300px;
	width: 1200px;
	border: 4px solid rgb(0, 0, 0);
    border-radius:15px;
    margin-left:80px;
    margin-bottom:20px;
    display: flex;
    flex-direction: row;
}

.col1{
    display: flex;
    flex-direction: column;
    padding-right:10px;
    width:100%;
}

.name{
    padding-right:5px;
    text-transform: capitalize;
    
}

.col2{
    display: flex;
    padding-right:5px;
    padding-left:5px;
    padding-top: 20px;
    width:100%;
    text-transform: capitalize;
}

.col3{
    display: flex;
    padding-right:5px;
    padding-left:5px;
    padding-top: 20px;
    width:100%;
}

.col4{
    display: flex;
    flex-direction: column;
    padding-right:5px;
    padding-left:5px;
    padding-top: 20px;
    width:100%;
}

    /* Style for the footer */
    footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position:relative;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .box-button {
        float:right;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        margin-top:150px;
        margin-right:50px;
        margin-bottom:20px;
        background-color: green;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


.box-button:hover {
    background-color: #ffaae3;
}

.editbtn {
        float:right;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        margin-top:200px;
        margin-right:380px;
        background-color: #c300ff;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }



.editbtn:hover {
    background-color: #e3b3ff;
}

</style>
</head>
<body>
    <!-- HEADER -->
    <div id="1"></div>
    <script>
        load("header.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(1).innerHTML = req.responseText;
        }
    </script>
    <section>
        <div class="head">
            <h1>MY ACCOUNT</h1>
        </div>
        <div class="edit">
            <button class="editbtn" onclick="edit()">AADHAAR VERIFICATION</button>
        </div>
    </section>
    <div class="content">
        <div class="image">
            <img src="img/<?php echo $row['user_img']?>.jpg">
        </div>
        <div class="details">
            <h2 class="name"><?php echo $row['fname'] ?></h2>
            <h3 class="email"><?php echo $row['email'] ?></h3>
            <h3 class="phone"><?php echo $row['mobile'] ?></h3>
            <h3 class="create">Created on: </h3>
        </div>
        <div class="loca">
            <div class="location"><?php echo $row['location'] ?></div>
            <div class="pointer"><i class="fas fa-map-marker map"></i></div> 
        </div>
    </div>
    <hr>
    <div class="myads">
        <h1>POSTED ADS</h1>
    </div>
    <div class="ads">
        <?php
        while($row1 = mysqli_fetch_array($result1))
        {
        ?>

        <div class="rectangle" onclick="location.href='req_verf.php?ID=<?php echo $row1['p_id']?>';" style= "cursor: pointer";>
            <div class="image">
                <img src="img/<?php echo $row1['img_path']?>.jpg">
            </div>
            <div class="col1">
                <h2 class="name"><?php echo $row1['p_name'] ?></h2>
                <!-- <h2 class="category">Drink</h2>-->
            </div>
            <div class="col2">
                <h2 class="desc"><?php echo $row1['description'] ?></h2>
            </div>
            <div class="col3">
                <h2 class="price">Rs. <?php echo $row1['price'] ?></h2>
            </div>
            <div class="col4">
                <h2 class="date"><?php echo $row1['date'] ?></h2>
                <div class="viewad">
                <?php if($row1['status']=="verified") { ?> <button class="box-button" onclick="location.href='req_verf.php'">Verified</button>
                <?php } elseif($row1['status']=="req_exp" || $row1['status']=="waiting" || $row1['status']=="rejected") { ?> <button class="box-button" onclick="location.href='req_verf.php'">Pending</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        
    </div>
    <!-- FOOTER -->
    <div id="4"></div>
    <script>
        load("footer.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(4).innerHTML = req.responseText;
        }
    </script>
    <script>
		function viewad() {
			window.location.href = "product.html"; 
        }
	</script>
    <script>
		function edit() {
            window.location.href = "aadhaar.php"; 
        }
	</script>
</body>

