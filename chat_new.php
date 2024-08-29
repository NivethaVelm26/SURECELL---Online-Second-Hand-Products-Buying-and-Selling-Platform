<?php
require_once('db.php');

session_start();
$user = $_SESSION['userid'];


$query = "SELECT CASE WHEN user1 != '$user' THEN user1 WHEN user2 != '$user' THEN user2 END AS different_colummn 
FROM chat WHERE user1 = '$user' OR user2 = '$user'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$query1 = "SELECT * from user where user_id='$user'";
$result1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_array($result1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> CHAT </title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="img/buysellicon.jpg" type="image" sizes="16x16">

<style>
    body {
        background-color: #ffffff;
        margin: 0;
        padding: 0;
        height: 100%;
}

#vertical-section {
            top: 50px;
            float:left;
            height: 100vh !important;
            width: 500px;
            background-color: #faffed;
            box-sizing: border-box;
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.302), 0 2px 6px 2px rgba(60, 64, 67, 0.149); 
            display:flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .head{
            padding-top:30px;
            padding-left:50px;
            padding-bottom:10px;
            font-size:30px;
        }

        #chatbox{
            display: flex;
            flex-direction: row;
            height: 70px;
            width: 500px;
            padding-top:20px;
            padding-bottom:20px;
        }

        #chatbox:hover{
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.302), 0 2px 6px 2px rgba(60, 64, 67, 0.149); 
            border-radius: 20px;
            cursor:pointer;
        }

        .pp{
            height: 70px;
            width: 70px;
            padding-left: 30px;
            display:flex;
        }

        img{
            border-radius:20px;
        }

        .deets{
            display:flex;
            flex-direction: column;
            padding-left:40px;
            padding-top:10px;
        }

        .lastmsg{
            padding-top:10px;
        }

        .chatheader{
            display: flex;
            flex-direction: row;
            height: 90px;
            width: 1185px;
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.302), 0 2px 6px 2px rgba(60, 64, 67, 0.149); 
            padding-top:20px;
        }

        .prof{
            height: 70px;
            width: 70px;
            padding-left: 30px;
            display:flex;
            border-radius:20px;
        }

        .chatarea{
        padding-left:80px;
        padding-right:30px;
        padding-top:30px;
        padding-bottom:30px;
        }

        .chatname{
            padding-left:40px;
            padding-top:10px;
            font-size:28px;
        }

        .receiver{
            display: flex;
            flex-direction: row;
            font-size:20px;
            height: 20px;
            width: 70px;
            padding:10px;
            margin-left:50px;
            border: 1px solid #333;  
            border-radius:15px;      
        }

        .right{
            display:flex;
            flex-direction:column;
            float:right;
        }

        .sender{
            display: flex;
            flex-direction: row;
            font-size:20px;
            float:right;
            min-width:70px;
            height: 20px;
            width: fit-content;
            padding:10px;
            border: 1px solid #333;
            border-radius:15px;      
        }

        .newmsg{
            font-size:20px;
            min-width:70px;
            float:right;
            margin-top:10px;
            height: 20px;
            width: fit-content;
            padding:10px;
            border: 1px solid #333;
            border-radius:15px;      
        }

        .box-button{
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ea82ff;
        bottom:0;
        right:0;
        position:fixed;
        margin-right:50px;
        margin-bottom:82px;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        margin-left:50px;
    }

.box-button:hover {
    background-color: #efbaff;
}

        #type{
        border-color:#d52cff;
        height:40px;
        width:890px;
        bottom:0;
        position:fixed;
        margin-bottom:80px;
        border-radius:20px;
        padding-left:35px;
        font-family: lato, sans-serif;
        margin-left:61px;
        margin-top:40px;
        font-size: 20px;
    }

footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position:fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

</style>
</head>
<body>
    <!-- HEADER -->
    <!-- <div id="1"></div>
    <script>
        load("header.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(1).innerHTML = req.responseText;
        }
    </script> -->

    <div id="vertical-section">
        <div class="head">CHATS</div>
        <div id="chatbox" onclick=openchat1()>
            <div class="pp">
                <img src="img/user1.jpg">
            </div>
            <div class="deets">
                <div class="name">Tharshini</div>
            </div>
        </div>
        <div id="chatbox" onclick=openchat2()>
            <div class="pp">
                <img src="img/user2.jpg">
            </div>
            <div class="deets">
                <div class="name">Faaiza</div>
            </div>
        </div>
    </div>

    <div id="mainchat1" style="display:none">
        <div class="chatheader">
            <div class="prof">
                <img src="img/user1.jpg">
            </div>
            <div class="chatname">Tharshini</div>
        </div>
        <div class="chatarea">
            <div class="receiver">hey</div>
            <div class="right">
                <div class="sender">heyy</div>
                <div class="newmsg">hii neenga pondy ah ?</div>
            </div>
        </div>
        <div class="send">
            <input type="text" id="type" placeholder="type a message">
            <button class="box-button" onclick="displaynewmsg()">SEND</button>
        </div>
    </div>

    <div id="mainchat2" style="display:none">
        <div class="chatheader">
            <div class="prof">
                <img src="img/user2.jpg">
            </div>
            <div class="chatname">Faaiza</div>
        </div>
        <div class="chatarea">
            <div class="receiver">hey</div>
            <div class="right">
                <div class="sender">heyy</div>
                <div class="newmsg">hii neenga pondy ah ?</div>
                <div class="new"></div>
            </div>
        </div>
        <div class="send">
            <input type="text" id="type" placeholder="type a message">
            <button class="box-button" onclick="displaynewmsg()">SEND</button>
        </div>
    </div>

    <script>    
        function openchat1() {
        var section = document.getElementById("mainchat1");
        if (section.style.display === "none") {
            section.style.display = "block";
        } else {
            section.style.display = "none";
        }
        }
    </script>

    <script>
        function displaynewmsg()
        const inputBox = document.getElementById("type");
        const displaySection = document.getElementById("new");

        inputBox.addEventListener("input", () => {
        const displayBox = document.createElement("div");
        displayBox.textContent = inputBox.value;
        displaySection.appendChild(new);
        });
    </script>

    <script>    
        function openchat2() {
        var section = document.getElementById("mainchat2");
        if (section.style.display === "none") {
            section.style.display = "block";
        } else {
            section.style.display = "none";
        }
        }
    </script>

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
</body>
</html>