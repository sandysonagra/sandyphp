<?php

include("connection.php");

$deleteID = $_GET['deleteID'];

$sql ="DELETE FROM `catagory` WHERE `ID` = '$deleteID'";

echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {

    header("location: catagory-dashboard.php");
}
 else {
    echo "Somthing problem in deleting";
}