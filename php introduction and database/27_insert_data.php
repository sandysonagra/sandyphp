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

      $name = "jaydeep";
      $destination = "halvad";

      $sql = "INSERT INTO `phptrip` (`name`, `dest`) VALUES ( '$name', '$destination')";
      $result = mysqli_query($conn, $sql);  


      if ($result) {
        echo "the record has been inserted sucessfully <br>";
    }
    else {
        echo "the record has been not inserted because of this error<br>" . mysqli_error($conn);
    }
      
      ?>