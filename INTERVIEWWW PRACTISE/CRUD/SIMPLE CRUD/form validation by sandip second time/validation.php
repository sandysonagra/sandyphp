<?php

include ('connection.php');

$id = $_POST['hidden'];

$name = $email = $address = $gender = $photo = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['name'])) {
        $error .= '&nameerr=*** please enter your name ***';
    } else {
        $name = $_POST['name'];
        $value .= '&namevalue=' . $name . '';
    }

    if (empty($_POST['email'])) {
        $error .= '&emailerr=*** please enter your email ***';
    } else {
        $email = $_POST['email'];
        $value .= '&emailvalue=' . $email . '';
    }

    if (empty($_POST['address'])) {
        $error .= '&addresserr=*** please enter your address ***';
    } else {
        $address = $_POST['address'];
        $value .= '&addressvalue=' . $address . '';
    }

    if (empty($_POST['gender'])) {
        $error .= '&gendererr=*** please select your gender ***';
    } else {
        $gender = $_POST['gender'];
        $value .= '&gendervalue=' . $gender . '';
    }

    if ($_FILES['photo']) {
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tempname, 'images/' . $filename);
    }


    if ($error != "") {
        header('location:form.php?id=' . $id . $error . $value);
    }
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['gender'])) {
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `student_form_second_time` (`name`,`email`,`address`,`gender`,`photo`) VALUES ('$name','$email','$address','$gender','$filename') ";

        $result = mysqli_query($conn, $sql);

        header('location:table.php');
        // print_r($sql);
        // exit;
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `student_form_second_time` SET `name`='$name', `email`='$email', `address`='$address', `gender`='$gender' WHERE id=$id ";
        print_r($sql);
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:table.php');
        } else {
            echo "not coonect";
        }
    }
}

?>