<!doctype html>
<html lang="en">

<head>
    <title>FORM PAGE</title>
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
    <div class="container">
        <center>
            <h2>REGISTRATION FORM</h2>
        </center>
        <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">NAME :</label>
                <input type="text" name="name" class="form-control"
                    value="<?php echo isset($_GET['namevalue']) ? $_GET['namevalue'] : '' ?>">
                <div class="error"><?php echo isset($_GET['nameerr']) ? $_GET['nameerr'] : '' ?></div>
            </div>
            <div class="form-group form-control">
                <label for="gender">GENDER :</label>
                <input type="radio" name="gender" value="male" <?php echo isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'male' ? 'checked' : '' ?>>Male
                <input type="radio" name="gender" value="female" <?php echo isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'female' ? 'checked' : '' ?>>Female
                <input type="radio" name="gender" value="other" <?php echo isset($_GET['gendervalue']) && $_GET['gendervalue'] == 'other' ? 'checked' : '' ?>>Other
                <div class="error"><?php echo isset($_GET['gendererr']) ? $_GET['gendererr'] : '' ?></div>
            </div><br>
            <div class="form-group">
                <label for="photo">PHOTO :</label>
                <input type="file" name="photo" class="form-control">
                <div class="error"><?php echo isset($_GET['photoerr']) ? $_GET['photoerr'] : '' ?></div>
            </div>

            <?php
            

            ?>
            <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-primary">
            <input type="submit" name="update" value="UPDATE" class="form-control btn btn-warning">
            <input type="hidden" name="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] :'' ?>"  >
            <button class="btn btn-warning form-control"><a href="form.php">RELOAD</a></button>
            <button class="btn btn-info form-control"><a href="table.php">SEE DATA</a></button>
        </form>
    </div>
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