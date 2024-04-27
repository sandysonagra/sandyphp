<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "php_crud_second_error_different_second_time";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    die("connection failed: $conn->connect_error");
}

?>