<?php

include "connection.php";

?>

<?php

$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";

$name = $email = $mobileno = $gender = $website = $agree = "";

//compare the method

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //empty error

    if (empty($_POST['name'])) {
        $nameErr = "*** Please Enter Your Name ***";
    } else {
        $name = input_data($_POST['name']);
        // if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        //     $nameErr = "Only Alphabets And White Spaces Allowed";
        // }
    }

    if (empty($_POST['email'])) {
        $emailErr = "*** Please Enter Your Email ***";
    } else {
        $email = input_data($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email Format";
        }
    }

    if (empty($_POST['mobileno'])) {
        $mobilenoErr = "*** Please Enter Your Mobile No. ***";
    } else {
        $mobileno = input_data($_POST['mobileno']);

        if (!preg_match("/^[0-9]*$/", $mobileno)) {
            $mobilenoErr = "Only Numeric Values are allowed";
        } elseif (strlen($mobileno) != 10) {
            $mobilenoErr = "Mobile number must be Contain 10 Digits";
        }
    }

    if (empty($_POST['website'])) {
        $websiteErr = "*** Website URL Is Required ***";
    } else {

        $website = input_data($_POST['website']);

        //check URL;
        if (!preg_match("~^(?:https?://)?(?:www\.)?[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})+(?:/[^\s]*)?$~i", $website)) {
            $websiteErr = "Invalid Website URL";
        }
    }

    if (empty($_POST['gender'])) {
        $genderErr = "*** Please select a gender ***";
    } else {
        $gender = input_data($_POST['gender']);
    }

    if (!isset($_POST['agree'])) {
        $agreeErr = "*** Please Accept Terms And Conditions Before Submitting The Form ***";
    } else {
        $agree = input_data($_POST['agree']);
    }



    if (empty($nameErr) && empty($emailErr) && empty($mobilenoErr) && empty($websiteErr) && empty($genderErr) && empty($agreeErr)) {

        if (isset($_POST['submit'])) {

            $sql = "INSERT INTO `php_crud_second_error` (name, email, mobileno, website, gender) VALUES ('$name', '$email', '$mobileno', '$website', '$gender')";

            if ($conn->query($sql) == TRUE) {
                // echo "New record created successfully";
                header("location: table.php"); // Redirect to table.php upon successful insertion
                exit(); // Exit to prevent further execution
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if (isset($_POST['update_data'])) {

            $upd = $_POST['update'];

            $sql = "UPDATE ` php_crud_second_error` SET `name`='$name',`mobileno`='$mobileno',`website`='$website',`gender`='$gender' ";

            $sql .= "WHERE id=$upd";

            // echo $sql;
            // exit();

            $result = mysqli_query($conn, $sql);

            if ($result) {

                header('location:table.php');
            }

        }
    }


}

function input_data($data)
{
    //remove spaces slashes  speacial symbols

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Registration Form</h2>
    <h3><a href="table.php">Show Register User Data</a></h3>
    <span class="error">*** Warning ::: All Fields Are Required ***</span><br><br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name :
        <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
            echo $_POST['name'];
        }

        if (isset($_GET['name'])) {
            echo $_GET['name'];
        }

        ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>

        Email :
        <input type="text" name="email" value="<?php if (isset($_POST['email'])) {
            echo $_POST['email'];
        }
        if (isset($_GET['email'])) {
            echo $_GET['email'];
        }
        ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        Mobile NO. :
        <input type="text" name="mobileno" value="<?php if (isset($_POST['mobileno'])) {
            echo $_POST['mobileno'];
        }
        if (isset($_GET['mobileno'])) {
            echo $_GET['mobileno'];
        }
        ?>">
        <span class="error"><?php echo $mobilenoErr; ?></span>
        <br><br>

        Website :
        <input type="text" name="website" value="<?php if (isset($_POST['website'])) {
            echo $_POST['website'];
        }
        if (isset($_GET['website'])) {
            echo $_GET['website'];
        }
        ?>">
        <span class="error"><?php echo $websiteErr; ?></span>
        <br><br>

        Gender :
        <input type="radio" name="gender" value="male" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == "male") {
                echo "checked";
            }
        }
        if (isset($_GET['gender'])) {
            if ($_GET['gender'] == "male") {
                echo "checked";
            }
        }
        ?>>Male
        <input type="radio" name="gender" value="female" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == "female") {
                echo "checked";
            }
        }
        if (isset($_GET['gender'])) {
            if ($_GET['gender'] == "female") {
                echo "checked";
            }
        }
        ?>>Female
        <input type="radio" name="gender" value="other" <?php
        if (isset($_POST['gender'])) {
            if ($_POST['gender'] == "other") {
                echo "checked";
            }
        }
        if (isset($_GET['gender'])) {
            if ($_GET['gender'] == "other") {
                echo "checked";
            }
        }
        ?>>Other
        <span class="error"><?php echo $genderErr; ?></span>
        <br><br>

        Agree To Terms Of Service :
        <input type="checkbox" name="agree" <?php if (isset($_POST['agree'])) {
            echo "checked";
        } ?>><br>
        <span class="error"><?php echo $agreeErr; ?></span>
        <br><br>


        <input type="submit" name="submit" value="SUBMIT">

        <input type="submit" name="update_data" value="UPDATE">
        <!-- <a href="index.php">Reload</a> -->

    </form>
</body>

</html>