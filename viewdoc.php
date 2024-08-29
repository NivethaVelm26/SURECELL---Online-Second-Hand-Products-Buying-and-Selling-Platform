<?php

require_once('db.php');

$id = $_GET['ID'];

$query = "SELECT * from applicants";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> DOCUMENT | ADMIN </title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="IMG/buysellicon.jpg" type="image" sizes="16x16">

</head>

<style>

    .body{
        margin: 0;
        font-family: 'Lato', sans-serif;
        height:100%;
    }

 .image {
    flex: 1;
	display: flex;
    padding-top:30px;
    padding-bottom:30px;
    padding-left:30px;
    width:100px !important;
    height:100px !important;
    border-radius: 50%;
}

.wrap{
    display:flex;
    flex-direction: row;
}

.box {
	display: flex;
	flex-direction: column;
	height: 700px;
	width: 500px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    padding:20px;
    margin-left:500px;
}

.box2 {
	display: flex;
	height: 700px;
	width: 900px;
	border: 2px solid rgb(32, 228, 146);
    border-radius:10px;
    padding:20px;
    margin-left:50px;
}

</style>
</body>
    <div class="box">
        <div class="image">
            <img src="img/<?php echo $row['doc']?>.jpg">
        </div>
    </div>

</body>
</html>