<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Forgot Password</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .login-box {
            margin: 0 auto;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-logo a {
            color: #007bff;
            font-size: 28px;
            text-decoration: none;
        }

        .login-card-body {
            padding: 20px;
        }

        .login-box-msg {
            text-align: center;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .input-group-text {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        .input-group-text .fas {
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .mb-1 {
            margin-bottom: 10px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>KK</b>SONAGRA</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Recover Your Accounts. Please Enter Your Email</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Request new
                                password</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="login1.php">Login</a>
                </p>
                Recover_Password
                <p class="mb-0">
                    <a href="LOGIN_FORM.php" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
    <?php
    include("config.php");

    if (isset($_POST["submit"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $token =md5(rand());

        $sql = "SELECT * FROM `login_register_session_table` WHERE EMAIL = '$email'";
        $result = mysqli_query($conn, $sql);


        $TOTAL = mysqli_num_rows($result);

        if ($TOTAL == 1) {
            $row = mysqli_fetch_assoc($result);


            $username = $row["FNAME"];
            $subject = "Password Reset";
            $body = "Hi,$username.Click Here too Activate your account ";


            if (mail($email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
            } else {
                echo "Email sending failed...";
            }
        }
    }

    ?>

</body>

</html>