<?php

include("connection.php");

$deleteID = $_GET['deleteID'];

$sql ="DELETE FROM `tag` WHERE `ID` = '$deleteID'";

echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {

    header("location: tag-dashboard.php");
}
 else {
    echo "Somthing problem in deleting";
}