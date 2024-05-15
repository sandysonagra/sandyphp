<?php
include("catagory/connection.php");
$newID = $_POST['updateid'];

// print_r($_POST);
// exit;
$error = "";
$value = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST['title'])) {
        $error .= 'titleERR=*title_must_be_required.';
    } else {
        $title = $_POST['title'];
        $value .= '&title=' . $title;
    }
    if (empty($_POST['description'])) {
        $error .= '&descriptionERR=*description_must_be_required.';
    } else {
        $description = $_POST['description'];
        $value .= '&description=' . $description;
    }
    if (empty($_POST['catagory'])) {
        $error .= '&catagoryERR=*catagory_must_be_required.';
    } else {
        $catagory = $_POST['catagory'];
        $value .= '&catagory=' . $catagory;
    }
    $filename = $_FILES['images']['name'];
    $tmpname = $_FILES['images']['tmp_name'];

    if (empty($filename)) {
        $error .= '&imagesERR=*images_must_be_required.';
    } else {
        move_uploaded_file($tmpname, "resource/" . $filename);
        $value .= '&images=' . $filename;
    }
    if (empty($_POST['tag'])) {
        $error .= '&tagERR=*tag_must_be_required.';
    } else {
        $tag = $_POST['tag'];
        $value .= '&tag=' . $tag;
    }

    if (!empty($error)) {
        header("location:product-form.php?id=$newID&" . $error . $value);
    }
}
if (!empty($title) && !empty($filename) && !empty($description) && !empty($catagory)) {

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `product_form`(`TITLE`,`DESCRIPTION`,`IMAGE`,`CATAGORY`,`TAG`)VALUE('$title','$description','$filename','$catagory','$tag')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "submited";
            header("location:product-dashbord.php");
        } else {
            echo "Somthing problem in inserting";
        }
    }
    if (isset($_POST["update"])) {
        $sql = "UPDATE `product_form` SET `TITLE` = '$title', `DESCRIPTION` = '$description', `CATAGORY` = '$catagory', `IMAGE` = '$filename', `TAG` = '$tag' WHERE `ID` = $newID";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:product-dashbord.php");
            echo "updated";
        }
    }
}
