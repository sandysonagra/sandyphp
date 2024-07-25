<?php
include("connection.php");

$ERROR = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['rollnumber']) || empty($_POST['gender'])) {

        if (empty($_POST['name'])) {
            $ERROR['name'] = "*required_your_name.";
        }

        if (empty($_POST['email'])) {
            $ERROR['email'] = "*required_your_email.";
        }
        if (empty($_POST['password'])) {
            $ERROR['password'] = "*required_your_password.";
        }
        if (empty($_POST['rollnumber'])) {
            $ERROR['rollnumber'] = "*required_your_rollnumber.";
        }
        if (empty($_POST['gender'])) {
            $ERROR['gender'] = "*required_your_gender.";
        }

        echo json_encode(['status' => 400, 'ERROR' => $ERROR]);
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rollnumber = $_POST['rollnumber'];
        $gender = $_POST['gender'];
        
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            
            $sql = "UPDATE `student_form_ajax` SET `NAME` = '$name', `EMAIL` = '$email', `PASSWORD` = '$password', `ROLLNUMBER` = '$rollnumber', `GENDER` = '$gender' WHERE `ID` = '$id'";
            
            $result = mysqli_query($conn, $sql);
            
            echo json_encode(["status" => 200, 'MSG' => 'updated']);
        } else {

            $sql = "INSERT INTO `student_form_ajax`(`NAME`, `EMAIL`, `PASSWORD`, `ROLLNUMBER`, `GENDER`) VALUES ('$name','$email','$password','$rollnumber','$gender')";

            $result = mysqli_query($conn, $sql);

            echo json_encode(["status" => 200, 'MSG' => 'inserted']);
        }
    }
}
