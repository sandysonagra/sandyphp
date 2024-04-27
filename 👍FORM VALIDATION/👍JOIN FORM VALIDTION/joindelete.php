<?php

include('joinconnection.php');

if (isset($_GET['deleteid'])) {
    # code...
    $id=$_GET['deleteid'];

    // $sql = "delete from `information` where id=$id";
    $sql = "DELETE FROM `joinusingform` WHERE `joinusingform`.`ID` = $id";

    $result=mysqli_query($conn, $sql);

    if ($result) {
    header('location: jointable.php');        
    }
    else {
        die(mysqli_error($conn));

    }
    
}

?>