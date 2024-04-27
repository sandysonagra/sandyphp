<?php
// echo "<h1>Your Input:</h1>";
// echo "first name =>" . $_POST['name'] . "</br>";
// echo "email id =>" . $_POST['email'] . "</br>";
// echo  "last name =>" . $_POST['lname'] . "</br>";
// echo "address =>" . $_POST['address'] . "</br>";
// if (isset($_POST['gender'])) {
//     echo "gender =>" . $_POST['gender'] . "</br>";
// }

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sandy_php_projects";

$conn =  mysqli_connect($servername, $username, $password, $dbname);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "success:";
// }
?>
