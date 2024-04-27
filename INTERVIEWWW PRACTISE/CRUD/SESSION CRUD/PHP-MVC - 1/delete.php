<?php

include ('connection.php');

$id = $_GET['deleteid'];
// print_r($id);
// exit;

$sql = "DELETE FROM `session_crud_by_sandip` WHERE `id`=$id";

$result = mysqli_query($conn, $sql);

// if($result)
// {
header('location:form.php');
// }

?>