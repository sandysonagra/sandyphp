<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $database = "dbsandy";

 $conn = mysqli_connect($servername, $username, $password, $database);

 if (!$conn) {
     die("sorry , we failed to connect : " . mysqli_connect_error());
 }
 else {
     echo "connection was successful <br>"; 
      }

      $sql = "SELECT * FROM `phptrip`";
      $result = mysqli_query($conn, $sql);


      //find the number of records returned;

    //   echo mysqli_num_rows($result);

      $num =  mysqli_num_rows($result);
      echo $num;
      echo "<br>";

      //display the rows returned by the sql query;

      if ($num > 0) {
        # code...
    //     $row = mysqli_fetch_assoc($result);
    //     echo var_dump($row);
    //   echo "<br>";
    //     $row = mysqli_fetch_assoc($result);
    //     echo var_dump($row);
    //   echo "<br>";
    //     $row = mysqli_fetch_assoc($result);
    //     echo var_dump($row);
    //   echo "<br>";
      
    //   $row = mysqli_fetch_assoc($result);
    //   echo var_dump($row);
    // echo "<br>";

//usng while loop;

while ($row = mysqli_fetch_assoc($result)) {
    echo var_dump($row);
    echo "<br>";
    # code...
}

      }

?>