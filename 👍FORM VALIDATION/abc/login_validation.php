<?php
include('conn.php');
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = "";
    $value = "";
    $main = 'login.php?';


    if ($email == '') {
        $error .= '&emailerror=please enter a email';
    } else {
        $value .= '&email=' . $email . '';
    }

    if ($password == '') {
        $error .= '&passworderror=please enter a password';
    } else {
        $value .= '&password=' . $password . '';
    }



    if ($error != '') {
        header('location:' . $main . '' . $error . '' . $value . '');
    } else {
        session_start();

        $sql = "SELECT * FROM `register` WHERE email= '$email' and  password='$password'";
        $Result = mysqli_query($conn, $sql);
        // print_r( $Result);
        // exit();

        $NumRow = mysqli_num_rows($Result);
       
        if ($NumRow == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location:welcome.php');
        } else {
            header('location:login.php');
             
           
        }
    }
}
