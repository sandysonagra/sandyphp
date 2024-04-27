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
      echo "--records found in database";
      echo "<br>";
      if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<br>";
}

      }


      $sql = "UPDATE `phptrip` SET `name` = 'sandy' WHERE `phptrip`.`sno` = 3";
      $result = mysqli_query($conn, $sql);


      if ($result) {
        # code...
        echo "we update record successfully";
      }
      else {
        echo " we can't uofate record";
      }
?>