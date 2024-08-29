<?php
require_once('db.php');
session_start();
$ex_id = $_SESSION['uid'];
$pid = $_GET['ID'];
$review = $_POST['review'];
$query = "UPDATE `verification` SET `review`='$review',`status`='verified' WHERE p_id= '$pid' and ex_id='$ex_id'";
$result = mysqli_query($conn,$query);
// $row = mysqli_fetch_array($result);
header('location:expertverf.php');

?>