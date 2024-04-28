<?php

include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($_POST['submit']))
{
    $sql = "INSERT INTO `login_register_by_me`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:login.php');
    }
}

?>