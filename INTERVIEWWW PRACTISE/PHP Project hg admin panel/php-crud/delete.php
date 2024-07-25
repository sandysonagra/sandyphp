<?php

include("connection.php");
$rowID =$_GET['deleteID'];

$sql ="DELETE FROM `student` WHERE `ID` ='$rowID'";
echo $sql;
$result = mysqli_query($conn, $sql);
if ($result) {
    // unlink("");
    header("Location:table.php");
}