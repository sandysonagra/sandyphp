<?php
session_start();

include ('connection.php');

$updateId = $_POST['updateId'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$image = $_FILES['image'];
$errors = [];
$values = [];

if (empty($name)) {
    $errors['name'] = 'First Name is required';
}
if (empty($email)) {
    $errors['email'] = 'Email is required';
}
if (empty($password)) {
    $errors['password'] = 'Password is required';
}
if (empty($gender)) {
    $errors['gender'] = 'Gender is required';
}

if ($image) {
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpname, 'images/' . $filename);
}
    
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    // $_SESSION['values'] = $values;
    $_SESSION['values'] = $_POST;
    header('Location:mainForm.php?updateid='.$updateId.'');
} else {
    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO `phpcrud`( `name`, `email`, `password`,`gender`,`image`) VALUES ('$name','$email','$password','$gender','$filename')";
        $result = mysqli_query($conn, $sql);
        session_destroy();
        header('Location:mainForm.php');
    }
    if(isset($_POST['update'])){
        $sql = "UPDATE `phpcrud` SET `name`='$name',`email`='$email',`password`='$password',`gender`='$gender',`image`='$filename' WHERE id=$updateId";
        $result = mysqli_query($conn, $sql);

        header('Location:mainForm.php');


    }

}

?>