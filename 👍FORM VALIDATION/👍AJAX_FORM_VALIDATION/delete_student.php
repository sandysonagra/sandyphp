<?php

include("config.php");

$id = $_POST['uid'];

$sql = "DELETE FROM `student` WHERE ID='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo"Student Deleted";
}

?>