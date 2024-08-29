<?php

require_once('db.php');

$query = "SELECT * FROM applicants";
$result = mysqli_query($conn,$query);
// $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> EXPERT APPLICANTS | ADMIN </title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="IMG/buysellicon.jpg" type="image" sizes="16x16">

<style>

body
{
    margin: 0;
    font-family: 'Lato', sans-serif;
    height:100%;
    overflow-y: auto;
}

    .req
        {
            width: 90%;
            margin: auto;
            padding-left:10px;
            padding-top: 35px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: capitalize;
        }

    h2{
        text-align: center;
        padding-top:10px;
    }

    .rect{
        display: flex;
	    flex-direction: row;
        padding:20px;
        margin-left:60px;
        margin-top:20px;
    }

    .box {
	display: flex;
	flex-direction: column;
	height: 500px;
	width: 300px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    padding:20px;
    margin-right:50px;
}

.box-button {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #78e7aa;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        margin-top:30px;
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #3e8e41;
}

.image {
    flex: 1;
	display: flex;
    padding-top:30px;
    padding-bottom:30px;
    padding-left:30px;
    width:20px !important;
    height:20px !important;
    border-radius: 50%;
}

/* Style for the footer */
footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position:relative;
            left: 0;
            bottom: 0 !important;
            width: 100%;
            margin-top:40px;
        }

</style>
<body>
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
    <h1 class="req">SELECTED APPLICANTS FOR EXPERT POSITION</h1>
	<div class="rect">
        <?php
        while($row = mysqli_fetch_array($result))
        {
        ?>
        <div class="box">
            <div class="image">
                <img src="img/<?php echo $row['img']?>.jpg">
            </div>
            <div class="id"><b>Id              :</b> <?php echo $row['id']?></div>
            <div class="name"><b>NAME          :</b> <?php echo $row['name']?></div>
            <div class="qual"><b>QUALIFICATION :</b> <?php echo $row['qual']?></div>
            <div class="spec"><b>SPEC          :</b> <?php echo $row['spec']?></div>
            <div class="lang"><b>LANGUAGES     :</b> <?php echo $row['lang']?></div>
            <div class="loc"><b>LOCATION       :</b> <?php echo $row['loc']?></div>
            <div class="phone"><b>PHONE        :</b> <?php echo $row['phone']?></div>
            <div class="email"><b>EMAIL        :</b> <?php echo $row['email']?></div>
            <div class="doc" onclick="location.href='viewdoc.php?ID=<?php echo $row['id']?>';" style="cursor: pointer; color:blue;"><b>DOCUMENT PROOF :</b> <?php echo $row['doc']?>.jpg</div>
            <div class="docu">
                <label for="myCheckbox"><b>PROOF VERIFIED </b></label> <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1">
            </div>
            <div class="division">
                <button class="box-button" onclick="location.href='newexpert.php?ID=<?php echo $row['id']?>';" style="cursor: pointer;">ADD EXPERT</button>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    
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
</body>
</html>
