<?php
session_start();
include ('connection.php');

?>

<!doctype html>
<html lang="en">

<head>
    <title>JOIN FORM</title>
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
            <h2>JOIN FORM</h2>
            <h3><a href="index.php">REGISTER HERE</a></h3>
        </center>
        <form action="joinvalidation.php" method="post">

            <div class="form-group">
                <label for="mobile">MOBILE :</label>
                <input type="text" name="mobile" class="form-control"
                    value="<?php echo isset($_SESSION['value']['mobile']) ? $_SESSION['value']['mobile'] : '' ?>">
                <div class="error"><?php echo isset($_SESSION['error']['mobile']) ? $_SESSION['error']['mobile'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <label for="price">PRICE :</label>
                <input type="text" name="price" class="form-control"
                    value="<?php echo isset($_SESSION['value']['price']) ? $_SESSION['value']['price'] : '' ?>">
                <div class="error"><?php echo isset($_SESSION['error']['price']) ? $_SESSION['error']['price'] : '' ?>
                </div>

            </div>
            <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-primary">
        </form>
    </div>
    <?php
    session_destroy();
    ?>
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