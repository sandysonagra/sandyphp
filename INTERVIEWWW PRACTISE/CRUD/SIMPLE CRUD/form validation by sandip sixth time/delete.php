<?php
include('connection.php');

$id = $_GET['deleteid'];

$sql = "DELETE FROM `student_form_sixth_time` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);

if($result)
{
    header('location:table.php');
}

?>