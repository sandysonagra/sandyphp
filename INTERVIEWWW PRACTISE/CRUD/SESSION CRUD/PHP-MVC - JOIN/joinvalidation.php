<?php
session_start();
include ('connection.php');

$price = $_POST['price'];
$mobile = $_POST['mobile'];

// print_r($price);
// exit();
if($mobile == "")
{
    $error['mobile'] = "*** please enter your brand mobile ***";
}
if($price == "")
{
    $error['price'] = "*** please enter your brand price ***";
}
if(!empty($error))
{
    $_SESSION['error'] = $error;
    $_SESSION['value'] = $_POST;

    header('location:joinform.php');
}else
{
    if(isset($_POST['submit']))
    {
        $sql = "INSERT INTO `join_session`(`mobile`,`price`) VALUES ('$mobile','$price')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header('location:joinform.php');
        }
    }
}

?>