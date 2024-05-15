<?php

include ('conn.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `login_register_second_time` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    // print_r($num_rows);
    // exit();

    if ($num_rows > 0) {
        header('location:register.php');
    } else {
        $sql = "INSERT INTO `login_register_second_time`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:login.php');
        }
    }
}

?>