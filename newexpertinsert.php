<?php

require_once('db.php');

// $appliid= $_GET['ID'];

$appliid=$_POST['aid'];
$ex_id = $_POST['ex_id'];
$pass = $_POST['pass'];
$role = $_POST['role'];
$name = $_POST['name'];
$quali = $_POST['qualification'];
$spec = $_POST['spec'];
$email = $_POST['email'];
$num = $_POST['num'];
$lang = $_POST['lang'];
$loc = $_POST['location'];

$query = "INSERT INTO `expert`(`ex_id`, `ex_name`, `location`, `mobile`, `spec`, `lang`, `qualification`, `img`) VALUES ('$ex_id','$name','$loc','$num','$spec','$lang','$quali','')";
$result = mysqli_query($conn,$query);

$query1 = "INSERT INTO `login`(`user_id`, `email`, `password`, `role`) VALUES ('$ex_id','$email','$pass','$role')";
$result1 = mysqli_query($conn,$query1);

$sql = "UPDATE `applicants` SET `status` = 'hired' WHERE `applicants`.`id` = '$appliid';";
$result2 = mysqli_query($conn,$sql);

header('location:expertappli.php');

?>