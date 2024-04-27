<?php
include("connection.php");

$id = $_GET["editid"];
$sql = "SELECT * FROM `information` WHERE `ID`=$id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $editvalue = "form_validation.php?id=$id";
    $firstname = $row["FIRSTNAME"];
    $editvalue .= '&name=' . $firstname;

    $lastname = $row['LASTNAME'];
    $editvalue .= '&lname=' . $lastname;

    $email = $row['EMAIL'];
    $editvalue .= '&emailre=' . $email;

    $address = $row['ADDRESS'];
    $editvalue .= '&addressre=' . $address;

    $gender = $row['GENDER'];
    $editvalue .= '&genderre=' . $gender;

    $game = $row['GAME'];
    $gameString = explode(',', $game);
    foreach ($gameString as $key => $value1) {
        $editvalue .= '&gamere[' . $key . ']=' . $value1;
    }

    header('Location: ' . $editvalue);
} else {
    // Handle the case when no records are found
    // You can redirect to an error page or take appropriate action here.
}
