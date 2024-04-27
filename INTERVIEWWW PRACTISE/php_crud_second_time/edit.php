<?php

include ('connection.php');

$id = $_GET['editid'];
// Escape user input to prevent SQL injection
$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT * FROM `php_crud_second_error_second_time` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $editvalue = "index.php?id=$id";

    $name = $row['name'];
    $editvalue .= '&name=' . $name;

    $email = $row['email'];
    $editvalue .= '&email='. $email;

    $mobileno = $row['mobileno'];
    $editvalue .= '&mobileno=' . $mobileno;

    $website = $row['website'];
    $editvalue .= '&website=' . $website;

    $gender = $row['gender'];
    $editvalue .= '&gender=' . $gender; 

    // Redirect to the edit page with values
    header('location:' . $editvalue);
} else {
    // Handle case where no record found
    // For example, redirect to an error page or show a message
    echo "No record found!";
    // You can redirect to an error page like this:
    // header('location: error.php');
}

?>
    