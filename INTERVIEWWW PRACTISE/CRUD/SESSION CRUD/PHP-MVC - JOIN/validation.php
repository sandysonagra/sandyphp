<?php
session_start();
include ('connection.php');


if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `session_crud_by_sandip_sixth_time` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:index.php');
        exit();
    }
}

$id = $_POST['hidden'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$photo = $_FILES['photo']['name'];


if ($name == "") {
    $error['name'] = " *** please enter your name *** ";
}
if ($gender == "") {
    $error['gender'] = " *** please select your gender *** ";
}
if ($photo == "") {
    $error['photo'] = " *** please select your photo *** ";
}
$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
move_uploaded_file($tempname, 'images/' . $filename);

if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;
    // print_r($_SESSION['value']);
    // exit;
   

    header('location:index.php?updateid='. $id .'');
} else {
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `session_crud_by_sandip_sixth_time`(`name`, `gender`, `mobile`, `photo`) VALUES ('$name','$gender','$mobile','$filename')";
        $result = mysqli_query($conn, $sql);
        // session_destroy();
        if ($result) {
            header('location:index.php');
        }
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip_sixth_time` SET `name`='$name',`gender`='$gender',`photo`='$filename' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:index.php');
        }
    }
}

?>