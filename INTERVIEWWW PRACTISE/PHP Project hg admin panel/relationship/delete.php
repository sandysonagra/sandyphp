<?php
include("catagory/connection.php");

$id = $_GET['deleteID'];
$sql ="DELETE FROM `product_form` WHERE `ID` ='$id'";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location:product-dashbord.php");
}else{
    echo "Somthing problem in deleting";
}