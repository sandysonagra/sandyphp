<?php

include ('connection.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `login_register_by_me` WHERE `email`='$email' ";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_fetch_assoc($result);

    if ($num_rows > 0) {
        header('location:register.php');
    } else {
        $sql = "INSERT INTO `login_register_by_me`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:login.php');
        }
    }

}
// if(isset($_POST['submit']))
// {
//    
// }

?>