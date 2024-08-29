<?php

session_start();
    
$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'se_project');

$name = $_POST['username'];
$pass = $_POST['password'];

$s = "SELECT * FROM login LEFT JOIN user ON login.user_id=user.user_id where login.email='$name' && login.password='$pass'";
// SELECT * FROM login INNER JOIN user ON login.user_id=user.user_id;

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);
$fname = $row['fname'];
$uid = $row['user_id'];
if(isset($row))
{
    $_SESSION['userid']=$name;
    $_SESSION['name']= $fname;
    $_SESSION['uid']= $uid;

    if(($row['role'])=="user")
    {
        header('location:index.php');
    }
    elseif(($row['role'])=="expert")
    {
        header('location:expertdash.php');
    }
    else
    {
        header('location:admindash.php');
    }
    
}
else
{
    header('location:loginfail.html');
}


?>