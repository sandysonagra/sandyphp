<?php
session_start();

include ('connection.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `session_crud_by_sandip_third_time` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:index.php');
        exit();
    }
}

$id = $_POST['hidden'];
$photo = $_FILES['photo']['name'];
$name = $_POST['name'];
$gender = $_POST['gender'];

if ($photo == "") {
    $error['photo'] = " *** please select your photo ***";
}

if ($name == "") {
    $error['name'] = " *** please enter your name *** ";
}
if ($gender == "") {
    $error['gender'] = " *** please select your gender *** ";
}

$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
move_uploaded_file($tempname, 'images/' . $filename);

if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;

    header('location:index.php?updateid=' . $id . '');
} else {
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `session_crud_by_sandip_third_time`(`photo`, `name`, `gender`) VALUES ('$filename','$name','$gender')";
        $result = mysqli_query($conn, $sql);
        session_destroy();
        if ($result) {
            header('location:index.php');
        }
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip_third_time` SET `photo`='$filename',`name`='$name',`gender`='$gender' WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:index.php');
        }
    }
}

?>