
<?php


include('connection.php');
// if (isset($_POST['update_data'])) {
// echo $abc;
// exit;   
// }
?> 

<?php

$filename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$folder = "images/" . $filename;
move_uploaded_file($tempname, $folder);


$jay =  $_POST['update'];

$main = "form_validation.php?&no=$jay";

$Error = "";
$value = "";


$first = $_POST['name'];
$last = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$game = $_POST['game'];


if ($first == "") {
    # code...
    $Error .= "&fname=*** please enter your firstname ***";
} else {
    $value .= '&name=' . $first . '';
}

if ($last == "") {
    # code...
    $Error .= "&lastname=*** please enter your lastname ***";
} else {
    $value .= '&lname=' . $last . '';
}

if ($email == "") {
    # code...
    $Error .= "&email=*** please enter your email ***";
} else {
    $value .= '&emailre=' . $email . '';
}


if ($address == "") {
    # code...
    $Error .= "&address=*** please enter your address";
} else {
    $value .= '&addressre=' . $address . '';
}


if ($gender == "") {
    # code...
    $Error .= "&gender=*** please select your gender";
} else {
    $value .= '&genderre=' . $gender . '';
}


if ($game == "") {
    $Error .= "&game=***please select your favourite game";
} else {
    $game1 = "";
    $gamevalue = "";

    foreach ($game as  $value1) {
        $gamevalue .= $value1 . ",";
    }
    $count = 0;
    foreach ($game as $key => $value1) {
        $game1 .= '&gamere[' . $key . ']=' . $value1;
        $count = $key;
    }
    if ($count < 1) {

        $value .= $game1;
        $Error .= "&game=*** please select atleast 2 games";
    } elseif ($count >= 4) {
        $value .= $game1;
        $Error .= "&game=*** please select maximum 4 games";
    } else {
        $value .= $game1;
    }
}


if ($Error != "") {

    header('location:' . $main . $value . '&' . $Error);
}



if ($first != "" && $last != "" && $email != "" && $address != "" && $gender != "" && $count >= 1 && $count <= 3) {
    if (isset($_POST['submit'])) {
        # code...

        $sql = " INSERT INTO `information` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `ADDRESS`, `SIGN`,`GENDER`, `GAME`) VALUES ('$first' , '$last' , '$email' , '$address', '$folder' , '$gender' , '$gamevalue' )";
        
        $result = mysqli_query($conn, $sql);

        header('location:table.php');
    }
    if (isset($_POST['update_data'])) {


        $upd = $_POST['update'];

        $sql = "UPDATE `information` SET `FIRSTNAME`='$first',`LASTNAME`='$last',`EMAIL`='$email',`ADDRESS`='$address', `GENDER`='$gender',`GAME`='$gamevalue'";

        if ($_FILES['image']['name']) {

            $filename = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = "images/" . $filename;
            move_uploaded_file($tempname, $folder);

            // $sql.= "`SIGN`='$folder'";
            $sql .= ", `SIGN`='$folder'";
        }

        $sql.= "WHERE ID=$upd";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            # code...
            header('location:table.php');
        }
    }
}
