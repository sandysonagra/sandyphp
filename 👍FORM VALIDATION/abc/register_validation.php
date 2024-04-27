<?php
include('conn.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $error = "";
    $value = "";
    $main = 'register_form.php?';
    if ($name == '') {
        $error .= '&nameerror=please enter a name';
    } else {
        $value .= '&name=' . $name . '';
    }

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

    if ($c_password == '') {
        $error .= '&c_passworderror=please enter a c_password';
    } else {
        if ($password == $c_password) {
            $value .= '&c_password=' . $c_password . '';
        } else {
            $error .= '&re_passworderror=please enter a not same';
        }
    }

    if ($error != '') {
        header('location:' . $main . '' . $error . '' . $value . '');
    } else {
        $query =  "INSERT INTO `register`(`name`, `email`, `password`, `c_password`) VALUES ('$name','$email','$password','$c_password')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('location:login.php');
        }
    }
}
