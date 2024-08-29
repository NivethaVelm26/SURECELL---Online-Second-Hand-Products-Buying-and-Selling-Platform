<?php

require_once('db.php');
session_start();
$user = $_SESSION['userid'];
$uid = $_SESSION['uid'];
$pid = $_SESSION['pidtosub'];
$rev = $_POST['w3review'];
$query = "UPDATE `verification` SET `review`='$rev',`status`='verified' WHERE p_id='$pid'";
$result = mysqli_query($conn,$query);
// $row = mysqli_fetch_array($result);
header('location:expertreview.php');

?>