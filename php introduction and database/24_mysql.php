<?php

echo "welcome to the stage where we are ready to get connected to a datbase <br>";

/*ways to connect to a mysql database
    1. mySQLi extension
    2.PDO
    */

    //connecting ti the database

    $servername = "localhost";
    $username = "root";
    $password = "";

    //create a connection

    $conn = mysqli_connect($servername, $username, $password);
    
    //die if connection was not successful
    if (!$conn) {
        die("sorry , we failed to connect : " . mysqli_connect_error());
    }
    else {
        echo "connection was successful"; 
    }

?>