<?php

include ('connection.php');

$id = $_POST['hidden'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$photo = $_FILES['photo']['name'];
// print_r($photo);
// exit;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($name)) {
        $error .= '&nameerr=***please enter your name***';
    } else {
        $value .= '&namevalue=' . $name . '';
    }

    if (empty($gender)) {
        $error .= '&gendererr=***please select your gender***';
    } else {
        $value .= '&gendervalue=' . $gender . '';
    }
    if (empty($photo)) {
        $error .= '&photoerr=***please select your photo***';
    }
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempname, 'images/' . $filename);


    if ($error != "") {
        header('location:form.php?' . $error . $value);
    }

    if (!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_FILES['photo']['name'])) {

        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO `session_crud_by_sandip_fifth_time`(`name`, `gender`, `photo`) VALUES ('$name','$gender','$filename')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location:table.php');
            }
        }

        if (isset($_POST['update'])) {
            $sql = "UPDATE `session_crud_by_sandip_fifth_time` SET `name`='$name',`gender`='$gender',`photo`='$filename' WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location:table.php');
            }
        }
    }

}

?>