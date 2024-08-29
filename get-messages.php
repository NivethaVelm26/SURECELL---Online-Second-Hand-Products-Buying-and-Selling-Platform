<?php
// Connect to the database
require_once('db.php');

// Query the database for the latest messages
$query = "select * from product";
$result = mysqli_fetch_array($conn,$query);

// Send the messages back to the client as JSON
header('Content-Type: application/json');
echo json_encode($messages);