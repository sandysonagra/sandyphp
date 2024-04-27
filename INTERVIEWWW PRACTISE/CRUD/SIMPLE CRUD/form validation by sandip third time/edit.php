<?php 

include('connection.php');
// echo $_POST;
// exit;
$id = $_GET['editid'];

$sql = "SELECT * FROM `student_form_third_time` where id = $id"; 
$result = mysqli_query($conn, $sql);
// print_r($result);

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

}

?>