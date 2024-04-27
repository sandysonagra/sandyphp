
<?php


include('joinconnection.php');
// if (isset($_POST['update_data'])) {
    // echo $abc;
    // exit;   
    // }
?> 

<?php

$filename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$folder = "images/".$filename;
// $folder1 = "images/".$filename;
move_uploaded_file($tempname, $folder);


 
$jay =  $_POST['update'];   

$main = "join_form_validation.php?&no=$jay";

$Error = "";
$value = "";


$first = $_POST['name'];
$last = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$productinfo = $_POST['product'];
// $image = $_POST['image'];
$gender = $_POST['gender'];
$game = $_POST['game'];
// echo $productinfo;



if ($first == "") {
    # code...
    $Error .= "&fname=*** please enter your firstname ***";
    
}
else {
    $value .= '&name='. $first.'';
}

if ($last == "") {
    # code...
    $Error .= "&lastname=*** please enter your lastname ***";
}
else {
    $value .= '&lname='. $last .'' ;
}

if ($email == "") {
    # code...
    $Error .= "&email=*** please enter your email ***";
}
else {
    $value .= '&emailre=' .$email.'';
}


if ($address == "") {
    # code...
    $Error .= "&address=*** please enter your address";
}
else {
    $value .= '&addressre=' .$address.'';
}

if ($productinfo == "") {
    # code...
    $Error .= "&producterror=*** please select your product***";
}
else {
    $value .= '&productre='.$productinfo.''; 
}



// if (isset($_FILES['image']) ) {
//     # code...
//     echo "hello";    
// }
// else {
//     header('location:form_validation.php');
// }

if ($gender == "") {
    # code...
    $Error .= "&gender=*** please select your gender";
}
else {
    $value .= '&genderre=' . $gender.'';
}


if ($game == "") {
    $Error .= "&game=***please select your favourite game";
}
else {
    $game1 = "";
    $gamevalue = "";
    
    foreach ($game as  $value1) {
        $gamevalue .= $value1 .",";
    }
    $count=0;
    foreach ($game as $key => $value1) {
        $game1 .= '&gamere['.$key.']='.$value1;
        $count=$key;
    }
    if ($count < 1) {
        
        $value .= $game1; 
        $Error .= "&game=*** please select atleast 2 games";
        }
        
        elseif ($count >= 4) {
            $value .= $game1; 
            $Error .= "&game=*** please select maximum 4 games";
        }else {
            $value .= $game1; 
        }
        
        
    }
    // echo $Error ;
    // echo "<pre>";
    // echo $value;
    // exit;
    
    if ($Error != "") {
        
        header('location:'. $main. $value . $Error );
        // echo "Error";
        // exit;
    }
    
    
    if ($first != "" && $last != "" && $email != "" && $address != "" && $productinfo != "" && $gender != "" && $count>=1 && $count <= 3 ) 
    
    {
        
        if (isset($_POST['submit'])) {
            // echo $productinfo;
            // exit;
            # code...
            
            $sql =" INSERT INTO `joinusingform` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `ADDRESS`, `SIGN` ,`IDPRODUCT`, `GENDER`, `GAME`) VALUES ('$first' , '$last' , '$email' , '$address', '$folder' , '$productinfo',  '$gender' , '$gamevalue' )";
            $result = mysqli_query($conn, $sql);
            
            header('location:jointable.php');
            
        }
        if (isset($_POST['update_data'])) {
            
            // $abc = $_POST['update'];
            // echo $abc;
            $upd = $_POST['update'];

            $sql = "UPDATE `joinusingform` SET `FIRSTNAME`='$first',`LASTNAME`='$last',`EMAIL`='$email',`ADDRESS`='$address', `SIGN`='$folder',`IDPRODUCT`='$productinfo',`GENDER`='$gender',`GAME`='$gamevalue' WHERE `ID`='$upd'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                # code...
                header('location:jointable.php');
            }    
        }   
    }

