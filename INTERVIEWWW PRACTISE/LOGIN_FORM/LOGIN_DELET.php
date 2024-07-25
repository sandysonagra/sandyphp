<?php
include('config.php');

$kuldip = $_GET['deleteid'];
echo
    $query = "DELETE FROM `login_register_session_table` WHERE `login_register_session_table`.`ID`='$kuldip'";

echo "<br>";
$data = mysqli_query($conn, $query);
echo "<br>";
if ($data) {
    header('location:LOGIN_TABLE.php');
}

?>