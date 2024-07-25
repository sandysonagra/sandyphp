<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location:welcome.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <style>
        .form {
            margin-top: 100px;
            /* margin-bottom: 100px; */

            /* border:solid 1px ; */
            margin-left: 600px;
            margin-right: 600px;
            /* height: 500px; */
            background-image: linear-gradient(orange, white, lime);

        }

        .button {
            background-color: #00fff2;
            height: 40px;
            width: 300px;
            border-radius: 15px;
            font-size: 20px;
        }

        .button:hover {
            background-color: red;
            color: white;
        }

        .color {
            color: red;
        }
    </style>
</head>
<body>
<center>
        <div class="form">
            <form action="login_validation.php" method="post">
                <fieldset>
                    <legend>sandip</legend>
                    <label for="email">email</label>
                    <input type="text" placeholder="email" name="email" value="<?php
                                                                                if (isset($_GET['email'])) {
                                                                                    echo $_GET['email'];
                                                                                }
                                                                                ?>">
                    <div class="color">
                        <?php
                        if (isset($_GET['emailerror'])) {
                            echo ($_GET['emailerror']);
                        }
                        ?>
                    </div>
                    <br><br><br>
                    <label for="password">password</label>
                    <input type="text" placeholder="password" name="password" value="<?php
                                                                                if (isset($_GET['password'])) {
                                                                                    echo $_GET['password'];
                                                                                }
                                                                                ?>">
                    <div class="color">
                        <?php
                        if (isset($_GET['passworderror'])) {
                            echo ($_GET['passworderror']);
                        }
                        ?>
                    </div>
                    <br><br><br>
                    <input type="submit" value="login" name="submit" class="button">
                    <a href="register_form.php">
                        <input type="button" value="register" name="submit" class="button">
                    </a>
                </fieldset>
            </form>
        </div>
</center>            
</body>
</html>