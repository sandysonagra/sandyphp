<?php
include("config.php");

$id = $_GET["editid"];
$sql = "SELECT * FROM `login_register_session_table` WHERE `ID`=$id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $editvalue = "LOGIN_FORM.php?ID=$id";
    $name = $row["FNAME"];
    $editvalue .= '&fname=' . $name;

    $password = $row['PASSWORD'];
    $editvalue .= '&pass=' . $password;

    $gmail = $row['EMAIL'];
    $editvalue .= '&gmailreturn=' . $gmail;

    

    header('Location: ' . $editvalue);
} else {
    // Handle the case when no records are found
    // You can redirect to an error page or take appropriate action here.
}
?>