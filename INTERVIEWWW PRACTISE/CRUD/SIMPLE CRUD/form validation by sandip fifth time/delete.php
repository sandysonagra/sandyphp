<?php
include('connection.php');

$id = $_GET['deleteid'];

$sql = "DELETE FROM `session_crud_by_sandip_fifth_time` WHERE `id`='$id' ";

$result = mysqli_query($conn,$sql);

if($result)
{
    header('location:table.php');
}

?>