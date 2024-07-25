<?php

include ('connection.php');

$id =$_POST['id'];

$name = $email = $address = $gender = $photo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $error .= '&nameerr=*** please enter your name ***';
    } else {
        $name = $_POST['name'];
        $value .= '&namevalue=' . $name . '';
    }

    if (empty($_POST['email'])) {
        $error .= '&emailerr=*** please enter your email ***';
    } else {
        $email = $_POST['email'];
        $value .= '&emailvalue=' . $email . '';
    }

    if (empty($_POST['address'])) {
        $error .= '&addresserr=*** please enter your address ***';
    } else {
        $address = $_POST['address'];
        $value .= '&addressvalue=' . $address . '';
    }

    if (empty($_POST['gender'])) {
        $error .= '&gendererr=*** please enter your gender ***';
    } else {
        $gender = $_POST['gender'];
        $value .= '&gendervalue=' . $gender . '';
    }

    if ($error != "") {
        header('location:form.php?id='.$id . $error . $value);
    }

    if($_FILES['photo'])
    {
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tempname, 'images/'.$filename);
    }

}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['gender'])) {
    if ($_POST['submit']) {
        $sql = "INSERT INTO `student_form_third_time`(`name`, `email`, `address`, `gender`, `photo`) VALUES ('$name','$email','$address','$gender','$filename')";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            header('location:table.php');
        }
        else
        {
            echo "you get some error in your insert code";
        }
    }

    if($_POST['update'])
    {
        $sql = "UPDATE `student_form_third_time` SET `name`='$name',`email`='$email',`address`='$address',`gender`='$gender', `photo`='$filename' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
       // print_r($result);
       
        if($result)
        {
            header('location:table.php');
        }
    }

}

?>