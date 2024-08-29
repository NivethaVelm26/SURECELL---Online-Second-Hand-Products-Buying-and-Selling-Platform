<?php

require_once('db.php');

$username = $_POST['username'];
$pass = $_POST['password'];
$fnamee = $_POST['fname'];
$lnamee = $_POST['lname'];
$emaill = $_POST['email'];
$mobilee = $_POST['mobile'];
$locationn = $_POST['location'];

$query = "INSERT INTO `user`(`user_id`, `fname`, `lname`, `mobile`, `location`, `aadhaar_num`, `user_img`) VALUES ('$username','$fnamee','$lnamee','$mobilee','$locationn','','')";
$result = mysqli_query($conn,$query);

// $query1 = "select * from user where email='$email'";
// $result1 = mysqli_query($conn,$query1);
// $row = mysqli_fetch_array($result1);
// $u_id = $row['user_id'];

// $query2 = "INSERT INTO `login`(`user_id`, `email`, `password`, `role`) VALUES ('$u_id','$email','$pass','user')";
// $result2 = mysqli_query($conn,$query2);

header('location:login.php');
?>