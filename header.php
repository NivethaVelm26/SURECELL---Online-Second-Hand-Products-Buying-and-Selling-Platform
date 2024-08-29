<?php
session_start();
if(isset($_SESSION['userid'])){
    $check = $_SESSION['userid'];
    $name = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SURECELL </title>
    <!-- favicon -->
    <link rel="icon" href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo" type="image/gif" sizes="16x16">
    <!-- EXTERNAL LINKS -->
    <link rel="stylesheet" href="css/header.css">
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<style>
  .profile-button {
    padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ff018d;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
  }
  .profile-button:hover {
    background-color: #0069d9;
  }

  .logout {
    padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ff018d;
        color: white;
        border: none;
        width:100%;
        margin-left: 20px;;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
  }
  .logout:hover {
    background-color: #0069d9;
  }

  .container {
			display: flex;
			align-items: center;
			justify-content: center;
            position: relative;
		}

		input[type="text"] {
			padding: 8px 8px;
			font-size: 16px;
			border-radius: 8px;
			border: 1px solid #ccc;
			box-sizing: border-box;
			margin-right: 30px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			font-size: 16px;
			padding: 10px 20px;
			border: none;
			border-radius: 8px;
			cursor: pointer;
        }

        .namee{
            font-size: 18px;
        }

        .user{
            display:flex;
            flex-direction:row;
        }

        .user a{
            display:flex;
            flex-direction:row;
        }
</style>
<body>
    
    <header>
        <section>
            <!-- MAIN CONTAINER -->
            <div id="container" style="top: 0px;">
                <!-- SHOP NAME -->
                <div id="shopName"><a href="index.php"> <b>SURE</b>CELL </a></div>
                <div id="collection">
                    <div id="clothing"><a href="index.php"> HOME </a></div>
                    <div id="accessories"><a href="postanad.html"> POST AN AD </a></div>
                    <div id="chat"><a href="chat.php"> MY CHATS</a></div>
                    <div id="about"><a href="about.html"> ABOUT</a></div>
                </div>
                    <!-- SEARCH SECTION -->
                    <div class="container">
                        <form action="index.php">
                            <input type="text" name="search" placeholder="Search...">
                            <input type="submit" value="Search">
                        </form>
	                </div>
                    
                    <!-- USER SECTION (CART AND USER ICON) -->
                    <div id="user">
                        <a href="session_check.php">            
                            <?php 
                            if(isset($check)) 
                            { 
                                ?> 
                                <i class="fas fa-user-circle userIcon"></i>
                                <label class="namee"><?php echo $name ?></label> 
                                <a href="logout.php"> <button class="logout">Logout</button> </a>
                                <?php 
                            } 
                            else 
                            { 
                                ?> 
                                <button class="profile-button">Sign up/in</button> 
                                <?php 
                            } 
                            ?> 
                            </a>
                    </div>
            </div>

        </section>
    </header>

</body>
</html>