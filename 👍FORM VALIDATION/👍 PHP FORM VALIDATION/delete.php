<?php

include('connection.php');

if (isset($_GET['deleteid'])) {
    # code...
    $id=$_GET['deleteid'];

    // $sql = "delete from `information` where id=$id";
    $sql = "DELETE FROM `information` WHERE `information`.`ID` = $id";

    $result=mysqli_query($conn, $sql);

    if ($result) {
    header('location: table.php');        
    }
    else {
        die(mysqli_error($conn));

    }
    
}

?>