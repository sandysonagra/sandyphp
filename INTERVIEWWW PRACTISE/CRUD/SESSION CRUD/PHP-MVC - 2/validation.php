<?php
session_start();
include ('conn.php');

if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `session_crud_by_sandip_second_time` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    header('location:index.php');
    exit();
}
$id = $_POST['hidden'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$photo = $_FILES['photo']['name'];

if ($name == "") {
    $error['name'] = "*** Please Enter Your Name ***";
}
if ($gender == "") {
    $error['gender'] = "*** Please Select Your Gender ***";
}
if ($photo == "") {
    $error['photo'] = "*** Please Select Your Photo ***";
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
        $sql = "INSERT INTO `session_crud_by_sandip_second_time`(`name`, `gender`,`photo`) VALUES ('$name','$gender','$filename')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:index.php');
        }
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `session_crud_by_sandip_second_time` SET `name`='$name',`gender`='$gender',`photo`='$filename' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        if ($result) {
            header('location:index.php');
        }
    }

}

?>