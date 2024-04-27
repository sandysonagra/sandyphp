<?php
$Server_name = "localhost";
$User_name = "username";
$Password = "password";
$DB_Name = 'CorePhp';

// Create connection
$conn = mysqli_connect($Server_name, $User_name, $Password, $DB_Name);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
?>