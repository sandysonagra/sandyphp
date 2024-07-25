<?php
include("config.php");
$xyz = $_POST['update'];
echo $xyz;

$main = "LOGIN_FORM.php?&upadateid=$xyz";
$name = $_POST['username'];
$password = $_POST['password'];
$gmail = $_POST['email'];
$allerror = "";
$allvalue = "";
if ($name == "") {
    $allerror .= '&nameerror=*please_enter_your_name*';
} else {
    $allvalue .= '&fname=' . $name . '';
}
if ($password == "") {
    $allerror .= '&passworderror=*please_enter_your_password*';
} else {
    $allvalue .= '&pass=' . $password . '';
}
if ($gmail == "") {
    $allerror .= '&gmailerror=*please_enter_your_gmail*';
} else {
    $allvalue .= '&gmailreturn=' . $gmail . '';
}
if ($allerror != "") {
    header('Location:' . $main . $allvalue . '&' . $allerror);

} else {

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `login_register_session_table`( `FNAME`, `PASSWORD`, `EMAIL`) VALUES ('$name','$password','$gmail')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo " value insert in table  successfully!";
            header('location:LOGIN.php');
        }
    }
     if (isset($_POST['update_data'])) {

        // echo "kulkdopi Somajkhk";
        $sql = "UPDATE `login_register_session_table` SET `FNAME`='$name', `PASSWORD`='$password', `EMAIL`='$gmail' WHERE ID = $xyz";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            header('Location: LOGIN_TABLE.php');
            exit; // Ensure no further code execution
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>