<?php

require_once('db.php');

// $query = "SELECT * FROM product INNER JOIN user INNER JOIN category INNER JOIN verification ON product.seller_id=user.user_id AND product.category=category.c_id AND verification.p_id=product.p_id where ex_id=''";
$query = "SELECT * FROM product INNER JOIN user INNER JOIN category INNER JOIN verification ON product.seller_id=user.user_id AND product.category=category.c_id AND verification.p_id=product.p_id where verification.status='req_exp'";
$result = mysqli_query($conn,$query);

$query1 = "SELECT * FROM expert";
$result1 = mysqli_query($conn,$query1);

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

    .req
        {
            width: 90%;
            margin: auto;
            padding-left:10px;
            padding-top: 30px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: capitalize;
        }

    h2{
        text-align: center;
        padding-top:10px;
    }

.rectangle {
	display: flex;
	flex-direction: row;
	height: 60px;
	width: 1100px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    margin-left:80px;
    margin-top:40px;
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
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

.division {
	flex: 1;
	display: flex;
	justify-content: center;
	align-items: center;
}

.right-section {
            position: absolute;
            top: 100px;
            right: 30px;;
            height: 70%;
            width: 400px;
            background-color: #ffffff;
            border: 1px solid #62ffa9;
            padding-top:20px;
            border-radius:10px;
		}

        .dropdown{
            text-align: center;
            padding-bottom: 20px;;
        }

        .dropdown-button {
			background-color: #a8ffab; /* Green */
			color: white;
			padding: 12px;
			font-size: 16px;
			border: none;
			cursor: pointer;
            border-radius:10px;
		}

		/* Style the dropdown content (hidden by default) */
		.dropdown-content {
			display: none;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
            border-radius:10px;
		}
        .dropdown-content option {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		/* Change color of dropdown links on hover */
		.dropdown-content option:hover {
			background-color: #f1f1f1;
		}

		/* Show the dropdown menu on hover */
		.dropdown:hover .dropdown-content {
			display: block;
		}

        .show {
			display: block;
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
    <h1 class="req">VERFICATION REQUESTS :</h1>
	<div class="rectangle">
		<div class="division">SELLER ID</div>
        <div class="division">LOCATION</div>
		<div class="division">PRODUCT NAME</div>
		<div class="division">CATEGORY</div>
		<div class="division">ALLOCATE EXPERT</div>
        <div class="division">CONFIRM</div>
	</div>

    <?php
    while($row = mysqli_fetch_array($result))
    {
    ?>

    <div class="rectangle">
		<div class="division"><?php echo $row['seller_id']?></div>
        <div class="division"><?php echo $row['location']?></div>
		<div class="division"><?php echo $row['p_name']?></div>
		<div class="division"><?php echo $row['c_name']?></div>
		<div class="division">
            <form action="allocate_expert.php" method="post">
            <label for="input-box" name="lab" style="font-family: sans-serif; font-size: 18px; color: #333; margin-bottom: 10px;"></label>
            <input type="text" id="input-box" name="ex_id" style="padding: 10px; border: 2px solid #ccc; border-radius: 5px; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); font-family: sans-serif; font-size: 16px; color: #666;">
            <input type="text" id="input-box" name="p_id" value="<?php echo $row['p_id']?>" style="padding: 10px; border: 2px solid #ccc; border-radius: 5px; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); font-family: sans-serif; font-size: 16px; color: #666;" hidden>
        </div>
        <div class="division">
            <button class="box-button">DONE</button>
            </form>
        </div>
	</div>
    <?php
    }
    ?>

    <div class="right-section">
        <div class="infoloc">
            <h2>EXPERTS INFO</h2>
            <div class="dropdown">
                <button class="dropdown-button" onclick="toggleDropdown()">Location</button>
                <!-- The dropdown content -->
                <div class="dropdown-content" id="dropdown-content">
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </div>
            </div>
        </div>
        <?php
        while($row1 = mysqli_fetch_array($result1))
        {
        ?>
            <div class="bar">
                <div class="divi"><?php echo $row1['ex_id']?></div>
                <div class="divi"><?php echo $row1['spec']?></div>
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
