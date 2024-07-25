<?php
include('config.php');
session_start();
if(isset($_SESSION['email'])){
    header('Location: LOGIN_TABLE.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin and login</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    <script
        nonce="3b338516-b034-493e-b0b8-24506a59fe7d">(function (w, d) { !function (bb, bc, bd, be) { bb[bd] = bb[bd] || {}; bb[bd].executed = []; bb.zaraz = { deferred: [], listeners: [] }; bb.zaraz.q = []; bb.zaraz._f = function (bf) { return async function () { var bg = Array.prototype.slice.call(arguments); bb.zaraz.q.push({ m: bf, a: bg }) } }; for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh); bb.zaraz.init = () => { var bi = bc.getElementsByTagName(be)[0], bj = bc.createElement(be), bk = bc.getElementsByTagName("title")[0]; bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text); bb[bd].x = Math.random(); bb[bd].w = bb.screen.width; bb[bd].h = bb.screen.height; bb[bd].j = bb.innerHeight; bb[bd].e = bb.innerWidth; bb[bd].l = bb.location.href; bb[bd].r = bc.referrer; bb[bd].k = bb.screen.colorDepth; bb[bd].n = bc.characterSet; bb[bd].o = (new Date).getTimezoneOffset(); if (bb.dataLayer) for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({ ...bp[1], ...bq[1] })), {}))) zaraz.set(bo[0], bo[1], { scope: "page" }); bb[bd].q = []; for (; bb.zaraz.q.length;) { const br = bb.zaraz.q.shift(); bb[bd].q.push(br) } bj.defer = !0; for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => { try { bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt)) } catch { bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt) } })); bj.referrerPolicy = "origin"; bj.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])); bi.parentNode.insertBefore(bj, bi) };["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
    <style>
        .form{
            width: 300px;
            height: 150px;

        }
        .login-box {
            width: 100%;
            // max-width: 400px;
            margin: 0 auto;
            width: 100%;
            max-height: 600px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
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
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">

            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="#" method="post" class="form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary " name="Login">Sign In</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="https://instagram.com/" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <p class="mb-1">
                    <a href="Forget_Password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="LOGIN_FORM.php" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
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
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>

<?php
if (isset($_POST['Login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];



    $sql = "SELECT * FROM `login_register_session_table` WHERE EMAIL ='$username'&& PASSWORD ='$password' ";
    $result = mysqli_query($conn, $sql);

    $TOTAL = mysqli_num_rows($result);

    if ($TOTAL == 1) {
        // header("location:listing.php");
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/PHP/FORM_VALIDATION/LOGIN_FORM/LOGIN_TABLE.php" />

        <?php
        $_SESSION["email"] = $username;
        $_SESSION["password"] = $password;
        echo "<div >login succssfully</div></marquee>";
        exit();
    } else {
        echo "<marquee behavior='alternate'><div >Login failed. Invalid username or password.</div></marquee>";

    }

}
?>