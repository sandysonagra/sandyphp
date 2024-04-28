<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "php_crud_second_error_different";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    die("connection failed: $conn->connect_error");
}
// else
// {
//     echo "Connection succeeded";
// }

 

?>