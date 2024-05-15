<?php

include("connection.php");
$newID = $_POST['updateID'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = null;
    $value = null;
    $phonenumber = $_POST['number'];

    $filename = $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];

    if (empty($filename)) {
        $error .= "fileERR=*required_your_photo.";
    } else {
        // $directroy = "/images" . $filename;
        move_uploaded_file($tmp_name, "images/$filename");
        $value .= "&file=" . $directroy . "";
    }
    if (empty($_POST["name"])) {
        $error .= "&nameERR=*required_your_name.";
    } else {
        $name = $_POST["name"];
        $value .= "&name=" . $name . "";
    }
    if (empty($_POST["email"])) {
        $error .= "&emailERR=*required_your_email.";
    } else {
        $email = $_POST["email"];
        $value .= "&email=" . $email . "";
    }
    if (empty($_POST["password"])) {
        $error .= "&passwordERR=*required_your_password.";
    } else {
        $password = $_POST["password"];
        $value .= "&password=" . $password . "";
    }
    if (empty($_POST["number"])) {
        $error .= "&numberERR=*required_your_number.";
    } else {
        $number = $_POST["number"];
        $value .= "&number=" . $number . "";
        echo $number;
    }
    if (empty($_POST["gender"])) {
        $error .= "&genderERR=*required_your_gender.";
    } else {
        $gender = $_POST["gender"];
        $value .= "&gender=" . $gender . "";
    }


    if ($error != "") {
        header("Location:form.php?id=".$newID."&".$error.$value."");
    }
}
if (!empty($filename) && !empty($name) && !empty($email) && !empty($password) && !empty($number) && !empty($gender)) {

    if (isset($_POST["submit"])) {

        $sql = "INSERT INTO `student`(`PHOTO`,`NAME`,`EMAIL`,`PASSWORD`,`NUMBER`,`GENDER`)VALUE('$filename','$name','$email','$password','$phonenumber','$gender')";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            header("location:table.php");
        } else {
            echo "Somthing problem in inserting";
        }
    }
    if (isset($_POST['update'])) {

        $sql = "UPDATE `student` SET `PHOTO`='$filename',`NAME`='$name',`EMAIL`='$email',`PASSWORD`='$password',`NUMBER`='$number',`GENDER`='$gender' WHERE `ID` = '$newID'";
        echo $sql;
        $data = mysqli_query($conn, $sql);

        if ($data) {
            header("Location:table.php");
        }
    }
}
