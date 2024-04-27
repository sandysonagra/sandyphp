
<?php

include('joinconnection.php');

?>



<?php



$Error = "";
$value = "";


$first = $_POST['name'];

if ($first == "") {

    $Error .= "fname=*** enter your product name***";
}
else{
    
    $Error .= 'name='. $first.'';

}

if ($Error != "") {
    header('location:inputbox.php?'. $value . $Error );
    
}


if ($first != "") {

    if (isset($_POST["submit"])) {

        $sql =" INSERT INTO `product` (`PRODUCT`) VALUES ('$first')";
        $result = mysqli_query($conn, $sql);

           
        header('location:inputboxtable.php');
    }

    if (isset($_POST['update_data'])) {
        $upd = $_POST['update'];

        $sql = "UPDATE `product` SET `PRODUCT`='$first' WHERE `ID`='$upd'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            # code...
            header('location:inputboxtable.php');
        }    
        # code...
    }

}



?>
