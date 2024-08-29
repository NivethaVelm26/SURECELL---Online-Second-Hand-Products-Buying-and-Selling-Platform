<?php
require_once('db.php');
session_start();
$user = $_SESSION['userid'];
$query = "SELECT * FROM `expert` INNER JOIN login ON expert.ex_id=login.user_id where login.email='$user'";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
// echo $row['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> EXPERT DASHBOARD </title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="IMG/buysellicon.jpg" type="image" sizes="16x16">

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
        h1
        {
            width: 90%;
            margin: auto;
            padding-left:10px;
            padding-top: 45px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: capitalize;
        }

        /* Style for the button container */
        .button-container {
            display: flex;
            flex-direction: row;
            justify-content: left;
            align-items: left;
            margin-top: 20px;
            padding-left:100px;
            padding-top:20px;
        }

        /* Style for the buttons */
        .button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 18px;
            font-weight: bold;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover style for the buttons */
        .button:hover {
            background-color: #3e8e41;
        }
        
        /* Style for the vertical section */
        #vertical-section {
            position: absolute;
            top: 50px;
            right: 0;
            height: 90%;
            width: 400px;
            background-color: antiquewhite;
            text-align: center;
        }

        .acc {
            padding-top:20px;
        }

        .image {
            height: 200px;
            width: 200px;
            padding-left: 100px;
            padding-top: 20px;
            padding-bottom:20px;
            display:flex;
        }

    img{
            border-radius: 20px !important;
    }

        /* Style for the footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        .container {
            float:left;
            width:800px;
            display: flex;
            flex-direction: row;
            align-items: center;
            padding-left:90px;
            padding-top:40px;
            padding-bottom:400px;
        }

        .box {
		width: 400px;
		height: 200px;
		background-color: #fff;
		margin: 10px;
		border: 1px solid #ccc;
		border-radius: 15px;
        padding-right:20px;
	}

    h2 {
        text-align: center;
    }

    p{
        padding-left:30px;
        padding-top:10px;
        }

    h4{
        padding-left:20px;
    }


    button {
        float:right;
    }

    .box-button {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ffc9e4;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #3e8e41;
}


    </style>
</head>
<body>
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
	<h1>Hi <?php echo $row['ex_name']."!";?></h1>
    <div class="container">
        <div class="box">
            <h2>EXPERT TASKS</h2>
            <p>Requests :</p>
            <button class="box-button" onclick="location.href='expertverf.php'">View requests</button>
        </div>
        <!-- <div class="box">
            <h2>VERIFIED PRODUCTS</h2>
            <p>Completed :</p>
            <button class="box-button">View</button>
        </div> -->
    </div>
    <div id="vertical-section">
        <h2 class="acc">Expert Info</h2>
        <div class="image">
            <img src="img/<?php echo $row['img']?>.jpg">
        </div>
        <h4 class="id">Expert ID : <?php echo $row['ex_id']; ?> </h4>
        <h4 class="name">NAME : <?php echo $row['ex_name']; ?></h4>
        <h4 class="qual">QUALIFICATION : <?php echo $row['qualification']; ?></h4>
        <h4 class="spec">SPECIFICATIONS :<?php echo $row['spec']; ?></h4>
        <h4 class="loc">LOCATION : <?php echo $row['location']; ?></h4>
        <h4 class="lang">LANGUAGES : <?php echo $row['lang']; ?></h4>
    </div>
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
       // alert('')
		function exverif() {
			window.location.href = "expertverf.html"; 
        }
	</script>
</body>
</html>
