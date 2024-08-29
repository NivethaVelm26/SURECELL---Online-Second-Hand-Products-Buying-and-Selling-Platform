<?php

require_once('db.php');
$ex_id = $_POST['ex_id'];
$pid = $_POST['p_id'];

$query = "UPDATE `verification` SET `ex_id`='$ex_id',`status`='waiting' WHERE p_id='$pid'";
$result = mysqli_query($conn,$query);
header('location:allocate.php');

?>