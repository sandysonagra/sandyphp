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
    <h1>REGISTRATION FORM</h1>
    <a href="table.php">VIEW STUDENT DATA</a><br><br>

    <form action="validation.php" method="post" enctype="multipart/form-data">

        <label for="name">NAME : </label>
        <input type="text" name="name" value="<?php if (isset($_GET['namevalue'])) {
            echo $_GET['namevalue'];
        } ?>"><br>
        <span class="error"><?php
        if (isset($_GET['nameerr'])) {
            echo $_GET['nameerr'];
        }

        ?></span><br><br>

        <label for="email">EMAIL : </label>
        <input type="email" name="email" value="<?php if (isset($_GET['emailvalue'])) {
            echo $_GET['emailvalue'];
        } ?>"><br>
        <span class="error"><?php
        if (isset($_GET['emailerr'])) {
            echo $_GET['emailerr'];
        }

        ?></span><br><br>

        <label for="address">ADDRESS : </label>
        <textarea name="address" cols="30" rows="1"><?php if (isset($_GET['addressvalue'])) {
            echo $_GET['addressvalue'];
        } ?></textarea><br>
        <span class="error"><?php if (isset($_GET['addresserr'])) {
            echo $_GET['addresserr'];
        } ?></span><br><br>

        <label for="gender">GENDER : </label>
        <input type="radio" name="gender" value="male" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'male')
        {

            echo "checked";
        }
        ?>>Male
        <input type="radio" name="gender" value="female" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'female')
        {

            echo "checked";
        }
        ?>>Female
        <input type="radio" name="gender" value="other" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'other')
        {

            echo "checked";
        }
        ?>>Other <br>
        <span class="error"><?php if (isset($_GET['gendererr'])) {
            echo $_GET['gendererr'];
        } ?></span><br><br>

        <label for="photo">PHOTO :</label>
        <input type="file" name="photo" ><br><br>


        <input type="submit" name="submit" value="SUBMIT">

        <input type="submit" name="update" value="UPDATE">

        <input type="hidden" name="hidden" value="<?php if (isset($_GET['id'])) {
            echo $_GET['id'];
        } ?>">

        <a href="form.php">RELOAD</a>

    </form>
</body>

</html>