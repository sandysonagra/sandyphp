<?php

include("connection.php");

$newID = $_POST['updateID'];
$tag_name = $_POST["name"];

$error = "";
$value = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
        $error .= "&tag_nameERR=*Please enter_your_tag_name.";
    } else {
        $value .= "&tag_name=" . $tag_name . "";
    }
}
if ($error != "0") {
    header("Location:tag.php?id=$newID" . $error . $value);
}

if (!empty($tag_name)) {

    if (isset($_POST["submit"])) {
        echo "hii";
        $sql = "INSERT INTO `tag` (`NAME`) VALUES ('$tag_name')";
        $data = mysqli_query($conn, $sql);
        if ($data) {
            header("location:tag-dashbord.php");
        } else {
            echo "Somthing problem in inserting";
        }
    } else {
        echo "hello";
        $sql = "UPDATE `tag` SET `NAME` = '$tag_name' WHERE ID = '$newID'";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            header("location:tag-dashbord.php");
        } else {
            echo "Somthing problem in updating";
        }
    }
}
