<!doctype html>

<html lang="en">

<head>
    <title>login form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form method="post">
        <h2 align="center">LOGIN FORM</h2>
        <hr><br><br>
        <div class="container">

            <div class="form-group">
                <label for="email">EMAIL : </label>
                <input type="text" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="text">PASSWORD : </label>
                <input type="text" name="password" class="form-control" required>
            </div>
        
            <div class="form-group">
                <button type="submit" name="login" class="form-control btn btn-success">LOGIN</button>
            </div>
        </div>
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

<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location:table.php');
}

include ('connection.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $password = $_POST['password'];

    $sql = "SELECT * FROM `login_register_kuldip` WHERE `email`='$email' AND `password`='$password'";
    // print_r($sql);
    // exit();
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
        header('location:table.php');
    } else {
        // echo "fail";
    }
}
?>