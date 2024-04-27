<?php

include('connection.php');

$nameErr = $emailErr = $mobilenoErr = $websiteErr = $genderErr = $agreeErr = "";
$name = $email = $mobileno = $website = $gender = $agree = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = " *** Please Enter your name *** ";
    } else {
        $name = input_data($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = " *** Please Enter your email *** ";
    } else {
        $email = input_data($_POST['email']);
    }

    if (empty($_POST['mobileno'])) {
        $mobilenoErr = " *** Please Enter your Mobile No *** ";
    } else {
        $mobileno = input_data($_POST['mobileno']);
    }

    if (empty($_POST['website'])) {
        $websiteErr = " *** Please Enter your Website *** ";
    } else {
        $website = input_data($_POST['website']);
    }

    if (empty($_POST['gender'])) {
        $genderErr = " *** Please Select your Gender *** ";
    } else {
        $gender = input_data($_POST['gender']);
    }

    if (!isset($_POST['agree'])) {
        $agreeErr = " *** Please Accept Terms And Conditions Before Submitting The Form *** ";
    } else {
        $agree = input_data($_POST['agree']);
    }

    if(empty($nameErr) && empty($emailErr) && empty($mobilenoErr) && empty($websiteErr) && empty($genderErr) && empty($agreeErr) )
    {
        $sql = "INSERT INTO `php_crud_second_error_second_time` (name, email, mobileno, website, gender) VALUES ('$name', '$email', '$mobileno', '$website', '$gender') ";

        if($conn->query($sql) == 'TRUE')
        {
            header('location:table.php');
        }
        else
        {
            echo "Error: ". $sql . "<br>" . $conn->error;
        }

    }

}

function input_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD SECOND TIME</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>REGISTRATION FORM</h2>
    <span class="error"> *** WARNING ::: ALL FIELDS ARE REQUIRED ***</span><br><br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

        Name :
        <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
            echo $_POST['name'];
        } ?>">
        <span class="error"><?php echo $nameErr; ?></span><br><br>

        Email :
        <input type="text" name="email" value="<?php if (isset($_POST['email'])) {
            echo $_POST['email'];
        } ?>">
        <span class="error"><?php echo $emailErr; ?></span><br><br>

        Mobile No. :
        <input type="text" name="mobileno" value="<?php if (isset($_POST['mobileno'])) {
            echo $_POST['mobileno'];
        } ?>">
        <span class="error"><?php echo $mobilenoErr; ?></span><br><br>

        Website :
        <input type="text" name="website" value="<?php if (isset($_POST['website'])) {
            echo $_POST['website'];
        } ?>">
        <span class="error"><?php echo $websiteErr; ?></span><br><br>

        Gender :
        <input type="radio" name="gender" value="male" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == 'male') {
                echo "checked";
            }
        }

        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == 'other') {
                echo "checked";
            }

        } ?>>Male
        <input type="radio" name="gender" value="female" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == 'female') {
                echo "checked";
            }

        } ?>>Female
        <input type="radio" name="gender" value="other" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == 'other') {
                echo "checked";
            }

        } ?>>Other
        <span class="error"><?php echo $genderErr; ?></span> <br><br>

        <span class="error">Agree To Terms Of Service :</span>
        <input type="checkbox" name="agree" <?php if (isset($_POST['agree'])) {
            echo "checked";
        } ?>>
        <span class="error"><?php echo $agreeErr; ?></span><br><br>

        <input type="submit" name="submit" value="SUBMIT">

    </form>

</body>

</html>