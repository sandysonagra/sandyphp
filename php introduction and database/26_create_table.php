<?php


/*ways to connect to a mysql database
    1. mySQLi extension
    2.PDO
    */

    //connecting ti the database

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbsandy";

    //create a connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("sorry , we failed to connect : " . mysqli_connect_error());
    }
    else {
        echo "connection was successful <br>"; 

        //create a table creation in db

        $sql =" CREATE TABLE .`phptrip` (`sno` INT(6) NOT NULL , `name` VARCHAR(12) NOT NULL , `dest` VARCHAR(6) NOT NULL ) ";

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
    }
    


?>