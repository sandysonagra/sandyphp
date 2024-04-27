<?php
include("config.php");
$id = isset($_POST['sid']) ? $_POST['sid'] : "";
$fname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$hobbies = isset($_POST['hobby']) ? $_POST['hobby'] : array();
$hobby = implode(', ', $hobbies);


$errors = array();
// echo $errors;
// exit;

if (empty($fname)) {
    $errors['firstname'] = "Please enter your firstname.";
}
if (empty($lname)) {
    $errors['lastname'] = "Please enter your lastname.";
}

if (empty($email)) {
    $errors['email'] = "Please enter your email.";
}

if (empty($gender)) {
    $errors['gender'] = "Please select your gender.";
}
if (empty($hobby)) {
    $errors['hobby'] = "Please select your hobby.";
}

if (empty($fname) || empty($lname) || empty($email) || empty($gender) || empty($hobby)) {
    echo json_encode(["status" => 0, "errors" => $errors]);
} else {

    $sql = mysqli_query($conn, "UPDATE `student` SET `FIRSTNAME`='$fname', `LASTNAME`='$lname', `EMAIL`='$email', `GENDER`='$gender', `HOBBY`='$hobby' WHERE ID='$id'");

    
    
    if ($sql) {
        echo json_encode(["successstatus" => 1, "data" => $_POST]);
    }
    
}
