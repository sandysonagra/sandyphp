
<?php


include('connection.php');

?> 

<?php




$jay =  $_POST['update'];

$main = "form_validation.php?&no=$jay";

$Error = "";
$value = "";


$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];



if ($user == "") {
    # code...
    $Error .= "&eusername=*** please enter your firstname ***";
} else {
    $value .= '&username=' . $user . '';
}

if ($pass == "") {
    # code...
    $Error .= "&epassword=*** please enter your password ***";
} else {
    $value .= '&password=' . $pass . '';
}

if ($email == "") {
    # code...
    $Error .= "&email=*** please enter your email ***";
} else {
    $value .= '&emailre=' . $email . '';
}


if ($Error != "") {

    header('location:' . $main . $value . '&' . $Error);
}



if ($user != "" && $pass != "" && $email != "") {
    if (isset($_POST['submit'])) {
        # code...

        $sql = "INSERT INTO `sessioninformation` (`USERNAME`, `PASSWORD`, `EMAIL`) VALUES ('$user' , '$pass' , '$email')";
        
        $result = mysqli_query($conn, $sql);

        header('location:loginform.php');


    }
    if (isset($_POST['update_data'])) {
    

        $upd = $_POST['update'];
        
        $sql = "UPDATE `sessioninformation` SET `USERNAME`='$user',`PASSWORD`='$pass',`EMAIL`='$email' WHERE ID=$jay";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            # code...
            header('location:loginform.php');
        }
    }
}
