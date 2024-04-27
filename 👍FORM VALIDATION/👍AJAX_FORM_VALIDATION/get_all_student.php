<?php

include("config.php");

$sql = "SELECT * FROM student "; //ORDER BY ID DESC
$result = mysqli_query( $conn, $sql );
// print_r ($result);
$json = array();

while($data = mysqli_fetch_assoc($result)){
    $json[]= $data;
}
$record["userdata"] = $json;
echo json_encode($record);
?>