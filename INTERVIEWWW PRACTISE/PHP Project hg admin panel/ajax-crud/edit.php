<?php

include('connection.php');

$id = $_POST['id'];

$sql = "SELECT * FROM `student_form_ajax` WHERE `ID` = '$id'";

$results = mysqli_query($conn, $sql);

$response =[];

while ($row = mysqli_fetch_array($results)){
    $response = $row;

}

echo json_encode($response);