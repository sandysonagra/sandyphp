<?php


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

    if (!$conn) {
        die("sorry , we failed to connect : " . mysqli_connect_error());
    }
    else {
        echo "connection was successful <br>"; 
    }
    
    $sql = "CREATE DATABASE dbsandy";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "the database was created sucessfully <br>";
    }
    else {
        echo "the database was not created because of this error<br>" . mysqli_error($conn);
    }
    echo "the result result is";
    echo  var_dump($result);
    echo "<br>"; 
    //die if connection was not successful

?>