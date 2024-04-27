<!doctype html>
<html lang="en">

<head>
    <title>PHP CRUD</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="validation.php" method="post" enctype="multipart/form-data" align="center">

        <h2 align="center">REGISTRATION FORM</h2>
        <a href="table.php">SHOW ALL STUDENT DATA </a><br><br>
        <label for="name">NAME : </label>
        <input type="text" name="name" value="<?php if (isset($_GET['namevalue'])) {
            echo $_GET['namevalue'];
        } ?>"><br>
        <span class="error"><?php if (isset($_GET['nameerr'])) {
            echo $_GET['nameerr'];
        } ?></span><br><br>

        <label for="email">EMAIL : </label>
        <input type="text" name="email" value="<?php if (isset($_GET['namevalue'])) {
            echo $_GET['namevalue'];
        } ?>"><br>
        <span class="error"><?php if (isset($_GET['emailerr'])) {
            echo $_GET['emailerr'];
        } ?></span><br><br>

        <label for="address">ADDRESS : </label>
        <textarea name="address" cols="30" rows="1"><?php if (isset($_GET['addressvalue'])) {
            echo $_GET['addressvalue'];
        } ?></textarea><br>
        <span class="error"><?php if (isset($_GET['addresserr'])) {
            echo $_GET['addresserr'];
        } ?></span><br><br>

        <label for="gender">GENDER :</label>
        <input type="radio" name="gender" value="male" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'male') {
            echo "checked";
        } ?>>Male
        <input type="radio" name="gender" value="female" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'female') {
            echo "checked";
        } ?>>Female
        <input type="radio" name="gender" value="other" <?php if (isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'other') {
            echo "checked";
        } ?>>Other <br>
        <span class="error"><?php if (isset($_GET['gendererr'])) {
            echo $_GET['gendererr'];
        } ?></span><br><br>

        <label for="photo">PHOTO : </label>
        <input type="file" name="photo"><br><br>

        <input type="submit" name="submit" value="SUBMIT">
        <input type="submit" name="update" value="UPDATE">
        <input type="hidden" name="hidden" value="<?php if (isset($_GET['id'])) {
            echo $_GET['id'];
        } ?>">
        <a href="form.php">RELOAD</a>

    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>