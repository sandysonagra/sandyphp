<?php

session_start();

include ('connection.php');

$id = $_POST['hidden'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$photo = $_FILES['photo'];
$error = [];
$value = [];

if (empty($name)) {
    $error['name'] = "*** please enter your name ***";
    // print_r($error);
    // exit();
}
if (empty($email)) {
    $error['email'] = "*** please enter your email ***";
}
if (empty($password)) {
    $error['password'] = "*** please enter your password ***";
}
if (empty($gender)) {
    $error['gender'] = "*** please select your gender ***";
}
if ($photo) {
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempname, 'images/' . $filename);
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;

    header('location:form.php?updateid='. $id .'');
} else {
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `session_crud_by_sandip`(`name`, `email`, `password`, `gender`, `photo`) VALUES ('$name','$email','$password','$gender','$filename')";

        $result = mysqli_query($conn, $sql);
        session_destroy();
        header('location:form.php');

        // print_r($result);
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip` SET `name`='$name',`email`='$email',`password`='$password',`gender`='$gender',`photo`='$filename' WHERE `id`=$id";

        $result = mysqli_query($conn, $sql);
        header('location:form.php');
    }
}


?>