<?php

require_once('db.php');
$pid = $_GET['ID'];
$query = "DELETE FROM `product` WHERE p_id='$pid'";
$result = mysqli_query($conn,$query);
$query1 = "DELETE FROM `verification` WHERE p_id='$pid'";
$result1 = mysqli_query($conn,$query1);

header('location:adminexpert.php');
?>