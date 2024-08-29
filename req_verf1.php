<?php

require_once('db.php');
$pid = $_GET['S_ID'];
$query = "UPDATE `verification` SET `status`='req_exp' WHERE `p_id`='$pid'";
$result = mysqli_query($conn,$query);

header('location:myaccount.php');
?>