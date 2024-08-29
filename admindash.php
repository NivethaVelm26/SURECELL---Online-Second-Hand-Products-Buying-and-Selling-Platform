<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ADMIN DASHBOARD </title>
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
            overflow-x:none;
}

        /* Style for the "Hi" element */
        .hi
        {
            width: 90%;
            margin: auto;
            padding-left:10px;
            padding-top: 35px;
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
        
        section{
            display:flex;
            flex-direction: row;
        }

        .acc {
            padding-top:20px;
        }

        /* Style for the footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            width:900px;
            padding-left:90px;
            padding-top:40px;
            padding-bottom:100px;
        }

        .row {
            float:left;
            display: flex;
            flex-direction: row;
            align-items: center;
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

    </style>
</head>
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

    <h1 class="hi">Hi Admin</h1>        
    <div class="container">
        <div class="row">
            <div class="box">
                <h2>VERIFICATION REQUESTS</h2>
                <p>Requests :</p>
                <button class="box-button" onclick="allocatereq()">View requests</button>
            </div>
            <div class="box">
                <h2>PRODUCT REPORTS</h2>
                <p>Completed :</p>
                <button class="box-button" onclick="viewreports()">View reports</button>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <h2>CREATE NEW EXPERT ACCOUNT</h2>
                <p>Completed :</p>
                <button class="box-button" onclick="createnewex()">Create account</button>
            </div>
            <div class="box">
                <h2>EXPERTS INFO</h2>
                <p>Completed :</p>
                <button class="box-button" onclick="editex()">View info</button>
            </div>
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

    <script>
		function allocatereq() {
			window.location.href = "allocate.php"; 
        }
	</script>
    <script>
		function viewreports() {
			window.location.href = "adminreport.php"; 
		}
	</script>
    <script>
		function createnewex() {
			window.location.href = "expertappli.php"; 
		}
	</script>
    <script>
		function editex() {
			window.location.href = "expertinfo.php"; 
		}
	</script>
</body>
</html>
