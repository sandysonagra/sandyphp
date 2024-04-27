<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "interview_practise_all_task_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    echo "Could not connect to adtabase";
}
else
{
    // echo "Connecting to databse";
}

?>