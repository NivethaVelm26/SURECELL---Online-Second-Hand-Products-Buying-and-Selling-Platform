<?php
// Connect to the database
require_once('db.php');

// Get the username and message from the form
$username = $_POST['username'];
$message = $_POST['message'];

// Insert the message into the database
$query = "INSERT INTO `message`(`id`, `sender`, `message`, `created_at`) VALUES ('','$username','$message',NOW())";
$result = mysqli_query($conn,$query);

// Redirect back to the chat page
header('Location: chat.php');