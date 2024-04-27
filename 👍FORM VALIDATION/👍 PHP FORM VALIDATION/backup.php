$main = "form_validation.php?";

if ($_POST['name'] == "") {
    $fnamevar = "fname=*** please enter your firstname ***";
    $main .= $fnamevar;
    header('location:' . $main . '');
} 
else {
    {
        $main.= 'name='.$first.'';
        header('location:' .$main);
    }   
}
if ($_POST['lname'] == "") {
    $lnamevar = "&lastname=*** please enter your lastname ***";
    $main .= $lnamevar;
    header('location:' . $main . '');
}
else {
    $main.= '&lname='.$last.'';
    header('location:'.$main);
}

if ($_POST['email'] == "") {
    # code...
    $emailvar = "&email=*** please enter your email ***";
    $main .= $emailvar;
    header('location:' . $main . '');
}
else {
    $main.= '&emailre='.$email.'';
    header('location:'.$main);
}

if ($_POST['address'] == "") {
    # code...
    $addressvar ="&address=*** please enter your address ***";
    $main .=$addressvar;
    header('location:' . $main . '');
}
else {
    $main.= '&addressre='.$address.'';
    header('location:'.$main);
}

if ($_POST['gender'] == "") {
    # code...
    $gendervar = "&gender=*** please select your gender ***";
    $main .= $gendervar;
    header('location:' . $main . '');
}
else {
    $main.='&genderre='.$gender.'';
    header('location:'.$main);
}

if ($_POST['game'] == "") {
    # code...
    $gamevar = "&game=*** please select your favourite game ***";
    $main .= $gamevar;
    header('location:' . $main . '');
    
}
else {
    $game1 = "";
    $gamevalue ="";
    foreach ($game as $value) {
        # code...
        $gamevalue .= $value.",";
        
    }

    foreach ($game as $key => $value) {
        # code...
        $game1 .= '&gamere['.$key.']='.$value;

        if ($key < 1) {
            $game = false;
            $error = "&game=please select minimum 2 games";
            # code...
        }
        else if ($key >= 4) {
            $game = false;
            $error = "&game=please select maximum 4 hobby";
            # code...
        }
        else {
            # code...
            $game = true;
            $error = "";
        }

    }
    $main.=$game1;
    $main.=$error;
    header('location:' .$main);
    header('location: table.php?');
    

    if ($first != "" && $last != "" && $email != "" && $address != "" && $gender != "" && $game == true) {
        if (isset($_POST['submit'])) {
            # code...

            $sql =" INSERT INTO `information` (`FIRST NAME`, `LAST NAME`, `EMAIL`, `ADDRESS`, `GENDER`, `GAME`) VALUES ('$first' , '$last' , '$email' , '$address' , '$gender' , '$gamevalue' )";
            $result = mysqli_query($conn, $sql);
        }
        
        if (isset($_POST['update'])) {
            # code...
            if ($_POST['hidden']) {
                # code...
            }
            $sql2 = "UPDATE `information` SET `FIRSTNAME`='$first',`LASTNAME`='$last',`EMAIL`='$email',`ADDRESS`='$address',`GENDER`='$gender',`GAME`='$game' WHERE `ID`=1";
            if ($sql2) {
                # code...
                header('location:table.php');
            }
        }
        



        <button class='btn btn-primary'>
        <a href='form_validation.php?updateid=$row[ID]&name=$row[FIRSTNAME]&lname=$row[LASTNAME]&emailre=$row[EMAIL]&addressre=$row[ADDRESS]&genderre=$row[GENDER]&gamere=$store' class='text-light'>EDIT</a>
        </button>