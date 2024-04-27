<?php
include("connection.php");

$id = $_GET["editid"];


$sql = "SELECT * FROM `sessioninformation` WHERE `ID`=$id";

$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $editvalue = "form_validation.php?id=$id";
    $username = $row["USERNAME"];
    $editvalue .= '&username=' . $username;

    $password = $row['PASSWORD'];
    $editvalue .= '&password=' . $password;

    $email = $row['EMAIL'];
    $editvalue .= '&emailre=' . $email;

    

    header('Location: ' . $editvalue);
} else {
   
}
