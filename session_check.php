<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'se_project');

session_start();

if(!$_SESSION['userid'])
{   
    header('location:login.php');
}
else
{
    header('location:myaccount.php');
}

?>