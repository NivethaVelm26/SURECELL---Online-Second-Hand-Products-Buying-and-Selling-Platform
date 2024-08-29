<?php

require_once('db.php');

$query = "select * from product where p_id={$_GET['ID']}";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$query1 = "SELECT * FROM product INNER JOIN verification ON product.p_id=verification.p_id where product.p_id={$_GET['ID']}";
$result1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_array($result1);

$query2 = "SELECT * FROM product INNER JOIN verification INNER JOIN expert ON product.p_id=verification.p_id and expert.ex_id=verification.ex_id where product.p_id={$_GET['ID']}";
$result2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <title> PRODUCT | BUY & SELL</title>
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
        letter-spacing: 2px;
        font-weight: 700;
        font-size:20px;
        text-transform: capitalize;
    }

    .revhead
    {
        width: 90%;
        margin: auto;
        padding-left:10px;
        padding-top:30px;
        padding-bottom:20px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size:20px;
        text-transform: capitalize;
    }

    .image {
            height: 450px;
            width: 450px;
            padding-left: 100px;
            padding-top: 20px;
            display:flex;
        }

    img{
            border-radius: 20px !important;
    }

    .content{
        display:flex;
        flex-direction: row;
        padding-bottom:30px;
    }

    .name{
        display:flex;
        flex-direction:column;
        padding-left:150px;
        padding-top:30px;
        padding-bottom:20px;
        font-size:35px;
        text-transform: capitalize;
    }

    .details{
        display:flex;
        flex-direction: column;
        width:700px;
    }

    .price{
        padding-left:150px;
    }

    .desc{
        padding-left:150px;
        text-transform: capitalize;
    }

    .descname{
        padding-left:150px;
    }

    .box-button {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        margin-left:150px;
        margin-top:20px;
        background-color: #ff018d;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width:200px;
        transition: background-color 0.3s ease;
    }

    .box {
		width: 600px;
		height: 500px;
		background-color: #fff;
		margin-left:90px;
		border: 1px solid #ccc;
		border-radius: 15px;
	}

    .inbox{
        width: 520px;
		height: 400px;
		background-color: #fff;
		margin-left:40px;
        margin-right:40px;
		border: 1px solid #ccc;
		border-radius: 15px;
    }


.box-button:hover {
    background-color: #ff94db;
}

.sumhead{
    text-align: center;
}

.row{
    display: flex;
    flex-direction: row;
}

.sum{
    font-size: 20px;
    padding: 10px 20px 10px 20px;;
}

.exarea{
    display: flex;
    flex-direction: row;
}

.expertname{
    padding-top:30px;
    padding-left:30px;
    text-transform: uppercase;
}

.expertcontact{
    padding-left:30px;
}

.sellerimg {
            height: 150px;
            width: 150px;
            padding-left: 40px;
            padding-top: 20px;
            display:flex;
            float: right;
            margin-left:60px;
        }

    img{
            border-radius: 50px !important;
    }

    /* Style for the footer */
    footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: RELATIVE;
            left: 0;
            margin-top:50px;
            bottom: 0;
            width: 100%;
        }

        .tick-icon {
			position: absolute;
			top: 100px;
			right: 60px;
			width: 70px;
			height: 70px;
			background-image: url('https://cdn-icons-png.flaticon.com/128/5610/5610944.png');
			background-size: cover;
			background-repeat: no-repeat;
			cursor: pointer;
		}
        .tick-text {
			position: absolute;
			top: 170px;
			right: 53px;
			width: 70px;
			height: 70px;
			cursor: pointer;
		}
</style>

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
    <div class="head">
        <h1><b>PRODUCT DETAILS</b> </h1>
    </div>
    
    <div class="content">
        <div class="image">
            <img src="img/<?php echo $row['img_path'] ?>.jpg">
        </div>
        <div class="details">
            <h1 class="name"><?php echo $row['p_name'] ?></h1>
            <h3 class="descname">DESCRIPTION  :</h3>
            <h2 class="desc"><?php echo $row['description'] ?></h2>
            <h2 class="price">RS. <?php echo $row['price'] ?></h2>
            <?php if($row1['status']=="nv"){ ?><button class="box-button" onclick="location.href='req_verf1.php?S_ID=<?php echo $row['p_id'];?>';">REQUEST</button> <?php }?>
        </div>
    </div>

    <?php
    if($row1['status']!="verified")
    {
    }
    else{
    ?>
        <div class="exrev">
        <div class="revhead">
            <h1><b>EXPERT REVIEW</b> </h1>
        </div>
        <div class="row">
            <div class="box">
                <h2 class="sumhead">REVIEW SUMMARY</h2>
                <div class="inbox">
                    <p class="sum"><?php echo $row1['review'] ?> </p>
                </div>
            </div>
            <div class="exarea">
                <div class="sellerimg">
                    <img src="img/seller1.jpg">
                </div>
                <div class="deets">
                    <h4 class="expertname">EXPERT : <?php echo $row2['ex_name'] ?></h4>
                    <h4 class="expertcontact">CONTACT : <?php echo $row2['mobile'] ?></h4>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>

    
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
		function viewselleracc() {
			window.location.href = "selleracc.php"; 
        }
	</script>
</body>

