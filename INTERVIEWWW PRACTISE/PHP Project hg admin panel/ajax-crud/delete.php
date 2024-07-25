<?php

include('connection.php');

$id =$_POST['id'];

$sql ="DELETE FROM `student_form_ajax` WHERE `ID` ='$id'";

$result = mysqli_query($conn, $sql);

echo json_encode(['status' => 200]);