<?php

include('connection.php');

$id = $_GET['editid'];

$sql = "SELECT * FROM  `session_crud_by_sandip_fifth_time` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($result))
{
    $editvalue = "form.php?editid=$id";

    $name = $row['name'];
    $editvalue .= '&namevalue='. $name .'';

    $gender = $row['gender'];
    $editvalue .= '&gendervalue='. $gender .'';

    header('location:'. $editvalue .'');
}


?>