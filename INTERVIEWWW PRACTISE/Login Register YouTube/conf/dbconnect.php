<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "hg_crud_made_by_me";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    echo "Error connecting todatabase";
}
else
{
    // echo "connect database successfully";
}


?>