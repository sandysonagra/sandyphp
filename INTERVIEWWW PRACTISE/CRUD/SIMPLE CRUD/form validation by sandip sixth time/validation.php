<?php

include ('connection.php');

$id = $_POST['hidden'];
// echo $id;
// exit();

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$photo = $_FILES['photo']['name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($name)) {
        $error .= '&nameerr= *** Please Enter Your Name *** ';
    } else {
        $value .= '&namevalue=' . $name . '';
    }
    if (empty($email)) {
        $error .= '&emailerr= *** Please Enter Your Email *** ';
    } else {
        $value .= '&emailvalue=' . $email . '';
    }
    if (empty($address)) {
        $error .= '&addresserr= *** Please Enter Your Address *** ';
    } else {
        $value .= '&addressvalue=' . $address . '';
    }
    if (empty($gender)) {
        $error .= '&gendererr= *** Please Select Your Gender *** ';
    } else {
        $value .= '&gendervalue=' . $gender . '';
    }
    if (empty($photo)) {
        $error .= '&photoerr= *** Please Select Your Photo *** ';
    }
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempname, 'images/' . $filename);

    if ($error != "") {
        header('location:index.php?id=' . $id . $error . $value);
    }

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['gender'])) {
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO `student_form_sixth_time`(`name`, `email`, `address`, `gender`, `photo`) VALUES ('$name','$email','$address','$gender','$filename')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header('location:table.php');
            }
        }

        if (isset($_POST['update'])) {
            $sql = "UPDATE `student_form_sixth_time` SET `name`='$name',`email`='$email',`address`='$address',`gender`='$gender',`photo`='$filename' WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);
            // echo $result;
            // exit();

            if ($result) {
                header('location:table.php');
            }
        }
    }

}



?>