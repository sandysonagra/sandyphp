<?php

include('connection.php');

$id = $_GET['deleteid'];
// print_r($delete);

$sql = "DELETE FROM `student_form` WHERE id=$id ";

$result = mysqli_query($conn, $sql);

if($result)
{
    header('location:table.php');
}

?>