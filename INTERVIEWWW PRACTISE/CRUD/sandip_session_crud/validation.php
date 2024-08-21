<?php
session_start();
include ('conn.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `crud_operation` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
        exit();
    }
}

$id = $_POST['hidden'];
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$language = isset($_POST['language']) ? $_POST['language'] : [];
$error = [];



if ($name == "") {
    $error['name'] = "Please Enter Your Name";
}
if ($email == "") {
    $error['email'] = "Please Enter Your email";
}
if ($password == "") {
    $error['password'] = "Please Enter Your password";
}
if ($address == "") {
    $error['address'] = "Please Enter Your address";
}

$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
move_uploaded_file($tempname, 'images/' . $filename);

if ($gender == "") {
    $error['gender'] = "Please Select Your gender";
}
if ($city == "") {
    $error['city'] = "Please Select Your city";
}
if (empty($language)) {
    $error['language'] = "Please Select Your Language";
}



if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;

    header("location:index.php?updateid='.$id.'");
} else {

    $language_str = implode(',', $language);

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `crud_operation`(`name`, `email`, `password`, `address`, `photo`, `gender`, `city`, `language`) VALUES ('$name','$email','$password','$address','$filename','$gender','$city','$language_str')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:index.php");
        }
    }
    if (isset($_POST['update'])) {

        $sql = "UPDATE `crud_operation` SET `name`='$name',`email`='$email',`password`='$password',`address`='$address',`photo`='$filename',`gender`='$gender',`city`='$city',`language`='$language_str' WHERE `id`='$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:index.php");
        }
    }
}


?>