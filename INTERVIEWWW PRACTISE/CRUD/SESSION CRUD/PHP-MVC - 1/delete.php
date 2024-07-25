<?php
include ('connection.php');
$deleteId = $_GET['deleteId'];
// print_r($deleteId) ;
$sql = "DELETE FROM `phpcrud` WHERE id=$deleteId";
$result = mysqli_query($conn, $sql);
header('location:mainForm.php');
?>
