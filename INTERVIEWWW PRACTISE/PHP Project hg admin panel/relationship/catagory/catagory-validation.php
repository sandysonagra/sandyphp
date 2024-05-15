<?php

include("connection.php");

$newID = $_POST['updateID'];
$catagory_name = $_POST["name"];

$error = "";
$value = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
        $error .= "&catagory_nameERR=*required_your_catagory_name.";
    } else {
        $value .= "&catagory_name=" . $catagory_name . "";
    }
}
if ($error != "0") {
    header("Location:catagory.php?id=$newID" . $error . $value);
}

if (!empty($catagory_name)) {

    if (isset($_POST["submit"])) {
        echo "hii";
        $sql = "INSERT INTO `catagory` (`NAME`) VALUES ('$catagory_name')";
        $data = mysqli_query($conn, $sql);
        if ($data) {
            header("location:catagory-dashboard.php");
        } else {
            echo "Somthing problem in inserting";
        }
    } else {
        echo "hello";
        $sql = "UPDATE `catagory` SET `NAME` = '$catagory_name' WHERE ID = '$newID'";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            header("location:catagory-dashboard.php");
        } else {
            echo "Somthing problem in updating";
        }
    }
}
