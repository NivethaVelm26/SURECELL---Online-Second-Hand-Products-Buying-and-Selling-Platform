<?php

require_once('db.php');
session_start();

$name = $_POST['name'];
$desc = $_POST['desc'];
$cate = $_POST['categ'];
$price = $_POST['price'];
$s_id = $_SESSION['uid'];
$img = $_FILES['filename']['name'];

$target_dir = "uploads/"; // directory where the file will be uploaded
$target_file = $target_dir . basename($_FILES["filename"]["name"]); // get the filename with extension
$image = pathinfo($target_file, PATHINFO_FILENAME); // get the filename without extension

$query = "INSERT INTO `product`(`p_id`, `p_name`, `seller_id`, `description`, `price`, `category`, `date`, `img_path`) VALUES ('','$name','$s_id','$desc','$price','$cate',NOW(),'$image')";
$result = mysqli_query($conn,$query);

$query1 = "select * from product where seller_id='$s_id' and p_name='$name'";
$result1 = mysqli_query($conn,$query1);
$row = mysqli_fetch_array($result1);
$pro_id = $row['p_id'];

$query2 = "INSERT INTO `verification`(`v_id`, `p_id`, `ex_id`, `review`, `req_date`, `review_date`, `status`, `img`) VALUES ('','$pro_id','','',NOW(),NOW(),'nv','')";
$result2 = mysqli_query($conn,$query2);

header('location:myaccount.php');
?>