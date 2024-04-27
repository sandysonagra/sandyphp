<?php
include ('conf/dbconnect.php');
include ('topmenu.php');
$name = $email = $password = $conf_password = "";
$nameerr = $emailerr = $passworderr = $conf_passworderr = "";
$success_msg = $error_msg = "";

$error = false;

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $conf_password = trim($_POST['conf_password']);

    //validate inputs

    if ($name == "") {
        $nameerr = "please enter your name";
        $error = true;
    }
    if ($email == "") {
        $emailerr = "please enter your email";
        $error = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "please enter valid email";
        $error = true;
    } else {
        $sql = "select * from users where email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $emailerr = "email already exist";
            $error = true;
        }
    }

    if ($password == "") {
        $passworderr = "please enter your password";
        $error = true;
    }
    if ($conf_password == "") {
        $conf_passworderr = "please enter your confirm password";
        $error = true;
    }
    if ($password != "" && $conf_password != "") {
        if ($password != $conf_password) {
            $conf_passworderr = "Password Do Not Match";
            $error = true;
        }
    }

    if (!$error) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into `users` (name, email, password) values(?,?,?) ";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $password);
            $stmt->execute();
            $success_msg = "Registration Successfully. Please Login <a href='login.php'> Here</a>";
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
        }
    }

}

?>

<div class="container">
    <h1>Registration</h1>
    <div class="show-err">
        <?php
        if (!empty($success_msg)) {
            ?>

            <div class="alert alert-success">
                <?= $success_msg; ?>
            </div>
        <?php } ?>

        <?php
        if (!empty($error_msg)) {
            ?>

            <div class="alert alert-danger">
                <?= $error_msg; ?>
            </div>
        <?php } ?>

    </div>


    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" placeholder="please enter your name" class="form-control"
                value="<?= $name ?>">
            <div class="text-danger input-err"><?= $nameerr ?></div>
        </div>

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

        <div class="mb-3">
            <label for="conf_password" class="form-label">Confirm Password</label>
            <input type="password" name="conf_password" id="conf_password"
                placeholder="please enter your Confirm Password" class="form-control" value="<?= $conf_password ?>">
            <div class="text-danger input-err"><?= $conf_passworderr ?></div>

        </div>

        <div class="form-check">
            <input type="checkbox" name="" id="" value="checkedvalue" class="form-check-input"
                aria-label="Text For Screen Reader" onclick="show_password()">SHOW PASSWORD
        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
        </div>
        <p>Already Registered ? Login<a href="login.php"> Here</a></p>

    </form>
</div>

<script>
    function show_password() {
        var password = document.getElementById("password");
        var conf_password = document.getElementById("conf_password");

        if (password.type === "text")
            password.type = "password";
        else
            password.type = "text";

        if (conf_password.type === "text")
            conf_password.type = "password";
        else
            conf_password.type = "text";
    }
</script>


</body>

</html>