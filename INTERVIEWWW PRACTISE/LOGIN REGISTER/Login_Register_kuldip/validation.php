<?php
include ('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `login_register_kuldip`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
    $result = mysqli_query($conn, $sql);
// print_r($result);
// exit();
    if($result)
    {

        header('location:login.php');
    }
    
}

?>