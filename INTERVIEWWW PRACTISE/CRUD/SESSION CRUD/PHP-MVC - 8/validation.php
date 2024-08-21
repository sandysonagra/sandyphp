<?php

session_start();
include('conn.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `session_crud_by_sandip_bm_coder` WHERE `id`='$id' ";
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

if ($name == "") {
    $error['name'] = "please enter a name";
}
if ($contactno == "") {
    $error['contactno'] = "please enter a contact no";
}
if ($gender == "") {
    $error['gender'] = "please enter a gender";
}
// if ($photo == "") {
//     $error['photo'] = "please chhose a photo";
// }
if ($address == "") {
    $error['address'] = "please enter a address";
}
if ($area == "") {
    $error['area'] = "please select a area";
}
if ($language == "") {
    $error['language'] = "please select a language";
}
$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
move_uploaded_file($tempname, 'images/' . $filename);
// print_r($_FILES);
// exit();


if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;

    header('location:index.php?updateid=' . $id . '');
} else {
    $language_str = implode(',', $language);
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `session_crud_by_sandip_bm_coder`(`name`, `contactno`, `gender`, `photo`, `address`, `area`, `language`) VALUES ('$name','$contactno','$gender','$filename','$address','$area','$language_str')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:index.php');
        }
    }
    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip_bm_coder` SET `name`='$name',`contactno`='$contactno',`gender`='$gender',
        `photo`='$filename',`address`='$address',`area`='$area',`language`='$language_str' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:index.php');
        }
    }
}

?>