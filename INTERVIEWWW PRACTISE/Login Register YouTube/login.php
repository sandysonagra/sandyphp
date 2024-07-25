<?php
session_start();

include ('conf/dbconnect.php');
include ('topmenu.php');
$email = $password = "";
$emailerr = $passworderr = "";
$error_msg = "";


$error = false;

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //validate inputs
    if ($email == "") {
        $emailerr = "please enter your email";
        $error = true;
    }

    if ($password == "") {
        $passworderr = "please enter your password";
        $error = true;
    }

    if (!$error) {
        $sql = "select * from `users` where email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $store_password = $row['password'];
            if (password_verify($password, $store_password)) {
                $_SESSION['name'] = $row['name'];
                header("Location:index.php");
            } else {
                $error_msg = "Incorrect Password";
            }
        } else {
            $error_msg = "Email Is Not Registered";
        }
    }

}

?>

<div class="container">
    <h1>Login</h1>

    <form action="" method="post">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" placeholder="please enter your email" class="form-control"
                value="<?= $email ?>">
            <div class="text-danger input-err"><?= $emailerr ?></div>

        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" placeholder="please enter your password"
                class="form-control" value="<?= $password ?>">
            <div class="text-danger input-err"><?= $passworderr ?></div>

        </div>

        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" value="checkedvalue" class="form-check-input"
                aria-label="Text For Screen Reader">REMEMBER ME
        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
        </div>
        <p>Not Registered ? Register<a href="register.php"> Here</a></p>

    </form>
</div>

</body>

</html>