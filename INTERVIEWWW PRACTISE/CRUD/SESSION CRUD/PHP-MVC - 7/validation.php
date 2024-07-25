<?php

session_start();

include ('connection.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `session_crud_by_sandip_seventh_time` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:index.php');
        exit();
    }
}


$id = $_POST['hidden'];
$name = $_POST['name'];
$contactno = $_POST['contactno'];
$gender = $_POST['gender'];
$photo = $_FILES['photo']['name'];
$address = $_POST['address'];
$area = $_POST['area'];
$language = $_POST['language'];

// $error = [];

if ($name == "") {
    $error['name'] = " *** Please Enter Your Name *** ";
}
if ($contactno == "") {
    $error['contactno'] = " *** Please Enter Your Contact Number ***  ";
}
if ($gender == "") {
    $error['gender'] = " *** Please Select Your Gender *** ";
}
if ($photo == "") {
    $error['photo'] = " *** Please Select Your Photo *** ";
}
if ($address == "") {
    $error['address'] = " *** Please Enter Your Address *** ";
}
if ($area == "") {
    $error['area'] = " *** Please Select Your Area *** ";
}
if ($language == "") {
    $error['language'] = " *** Please Select Your Language *** ";
}
$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
move_uploaded_file($tempname, 'images/' . $filename);


if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;
    // print_r($_POST);
    // exit();

    // print_r($_SESSION['error']);
    // exit();

    header('location:index.php?updateid=' . $id . '');
} else {
    $language_str = implode(',' , $language);
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `session_crud_by_sandip_seventh_time`(`name`, `contactno`, `gender`, `image`, `address`, `area`, `language`) VALUES ('$name','$contactno','$gender','$filename','$address','$area','$language_str')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:index.php');

        }
    }
    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip_seventh_time` SET `name`='$name',`contactno`='$contactno',`gender`='$gender',`image`='$filename',`address`='$address',`area`='$area',`language`='$language_str' WHERE `id`='$id'";
        // echo $sql;
        // exit();
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:index.php');
        }
    }
}


?>