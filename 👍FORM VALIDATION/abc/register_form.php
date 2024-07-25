<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <form action="register_validation.php" method="post">
                <fieldset>
                    <legend>sandip</legend>
                    <label for="name">name</label>
                    <input type="text" placeholder="name" name="name" value="<?php
                                                                                if (isset($_GET['name'])) {
                                                                                    echo ($_GET['name']);                                                                                   
                                                                                }
                                                                                ?>">
                    <div class="color">
                        <?php
                        if (isset($_GET['nameerror'])) {
                            echo ($_GET['nameerror']);
                        }
                        ?>
                    </div>
                    <br><br><br>
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
                    <label for="c_password"> confirm password</label>
                    <input type="text" placeholder="c_password" name="c_password" value="<?php
                                                                                if (isset($_GET['c_password'])) {
                                                                                    echo $_GET['c_password'];
                                                                                    }
                                                                                ?>">
                    <div class="color">
                        <?php
                        if (isset($_GET['c_passworderror'])) {
                            echo ($_GET['c_passworderror']);
                        }
                        if (isset($_GET['re_passworderror'])) {
                            echo ($_GET['re_passworderror']);
                        }
                        ?>
                    </div>
                    <br><br><br>
                    <input type="submit" value="submit" name="submit" class="button">
                    <a href="register_form.php">
                        <input type="button" value="reset" name="submit" class="button">
                    </a>

            </form>
        </div>
        </fieldset>
    </center>
</body>

</html>