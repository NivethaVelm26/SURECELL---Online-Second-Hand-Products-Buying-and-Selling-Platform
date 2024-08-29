<?php

require_once('db.php');
$query = "select * from product";
$result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <title> HOME | BUY&SELL</title>
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
        padding-top: 115px;
        letter-spacing: 2px;
        font-weight: 700;
        font-size:20px;
    }

    .content{
        display:flex;
        flex-direction: column;
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
			height: 110px;
            width:295px;
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
            padding-bottom:50px;
            padding-left: 90px;
            padding-top: 20px;
        }

        .box-btn {
        padding: 10px 20px;
        font-size: 18px;
        width:295px;
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
        <h1><b>RECENT PRODUCTS</b> </h1>
    </div>
    <div class="content">
    <?php
        $rowcount=mysqli_num_rows($result);
        for ($y = 0; $y < (($rowcount/4)); $y++)
        {
    ?>
        <div class="row">
            <?php
            for ($x = 0; $x < 4; $x++)
            {
            $row = mysqli_fetch_array($result)
            ?>
                <div class="col" onclick="location.href='product.php?ID=<?php echo $row['p_id']?>';" style="cursor: pointer;">
                    <div class="image">
                        <img src="img/buysellicon.jpg">
                    </div>
                    <div class="deets">
                        <div class="name"><?php echo $row['p_name'] ?></div>
                        <div class="price"><?php echo $row['price'] ?></div>
                    </div>
                    <div class="btn">
                        <button class="box-btn" onclick="viewprod()">VIEW AD</button>
                    </div>
                </div>
            <?php

            }
        }
            ?>  
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="image">
                    <img src="img/buysellicon.jpg">
                </div>
                <div class="deets">
                    <div class="name">BUBBLE TEA</div>
                    <div class="price">Rs. 150</div>
                </div>
                <div class="btn">
                    <form>
                        <button class="box-btn" onclick="viewprod()">VIEW AD</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="image">
                    <img src="img/buysellicon.jpg">
                </div>
                <div class="deets">
                    <div class="name">BUBBLE TEA</div>
                    <div class="price">Rs. 150</div>
                </div>
                <div class="btn">
                    <form>
                        <button class="box-btn" onclick="viewprod()">VIEW AD</button>
                    </form>
                </div>
            </div>
        </div> -->
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
		function viewprod() {
			window.location.href = "product.html"; 
        }
	</script>
</body>

