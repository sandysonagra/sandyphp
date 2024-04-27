<?php

include('connection.php');

$id = $_GET['editid'];

$sql = "SELECT * FROM `student_form` WHERE id=$id ";

$result = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($result))
{
    $editvalue = "form.php?id=$id";
    
    $name = $row['name'];
    $editvalue .= '&namevalue='. $name .'';
    
    $email = $row['email'];
    $editvalue .= '&emailvalue='. $email .'';
    
    $address = $row['address'];
    $editvalue .= '&addressvalue='. $address .'';

    $gender = $row['gender'];
    $editvalue .= '&gendervalue='. $gender .'';


    header('location:'. $editvalue);
    // print_r($editvalue);
}

// print_r  ($result);
// exit();  


?>