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
    <title> ALLOCATE EXPERTS | ADMIN </title>
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



.rect {
	display: flex;
	flex-direction: row;
	height: 50px;
	width: 1500px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    margin-left:80px;
    margin-top:40px;
    margin-bottom:25px;
}

.rectangle{
	display: flex;
	flex-direction: row;
	height: 110px;
	width: 1500px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    margin-left:80px;
    margin-bottom:10px;
}


.bar {
	display: flex;
	flex-direction: row;
	height: 30px;
	width: 350px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    margin:auto;
    margin-top:10px;
}

.divi {
	flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
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
        transition: background-color 0.3s ease;
    }

.box-button:hover {
    background-color: #3e8e41;
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


    .division{
        flex: 1;
	display: flex;
	justify-content: center;
	align-items: center; 
    font-size: 18px;;
    }

.expp {
    width:80px;
    height:80px;
	flex: 1;
	display: flex;
    justify-content: center;
    padding-top: 14px;
}

.imgexpp{
    border-radius: 50%;
}

.exid {
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    text-align:center;
    font-size: 15px;
    margin-left:10px;
    text-transform: uppercase;
}
.exname{
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    font-size: 15px;
    text-transform: uppercase;
}
.exqual{
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    font-size: 15px;
    text-transform: uppercase;
}
 .exspec{
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    font-size: 15px;
    text-transform: uppercase;
 } 
 .exlang{
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    font-size: 15px;
    text-transform: uppercase;
 } 
 .exloc {
    flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
    font-size: 15px;
    text-transform: uppercase;
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
        <!-- <div class="division">EXPERT IMG</div> -->
		<div class="division">ID</div>
        <div class="division">NAME</div>
		<div class="division">QUALIFICATION</div>
        <div class="division">DOCUMENT PROOF</div>
		<div class="division">SPECIALIZATION</div>
        <div class="division">KNOWN LANGUAGES</div>
		<div class="division">LOCATION</div>
        <div class="division">PHONE</div>
		<div class="division">EMAIL ID</div>
        <div class="division">CREATE</div>
	</div>
    <div class="entry">
        <?php
        while($row = mysqli_fetch_array($result))
        {
        ?>

        <div class="rectangle">
        <div class="box">
            <div class="image">
                <img src="img/<?php echo $row['img']?>.jpg">
            </div>
            <div class="id"><?php echo $row['id']?></div>
            <div class="name"><?php echo $row['name']?></div>
            <div class="qual"><?php echo $row['qual']?></div>
            <div class="viewbtn">VIEW</div>
            <div class="spec"><?php echo $row['spec']?></div>
            <div class="lang"><?php echo $row['lang']?></div>
            <div class="loc"><?php echo $row['location']?></div>
            <div class="phone"><?php echo $row['phone']?></div>
            <div class="email"><?php echo $row['email']?></div>
            <div class="division">
                <button class="box-button">CREATE</button>
            </div>
        </div>
        </div>
        <?php
        }
        ?>

        <!-- <input type="text" class="exid" value="<?php echo $row['ex_id']?>" readonly>
            <input type="text" class="exid" value="<?php echo $row['ex_name']?>" readonly>
            <input type="text" class="exid" value="<?php echo $row['qualification']?>" readonly>
            <input type="text" class="exid" value="<?php echo $row['spec']?>" readonly>
            <input type="text" class="exid" value="<?php echo $row['lang']?>" readonly>
            <input type="text" class="exid" value="<?php echo $row['location']?>" readonly> -->

    </div>
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
