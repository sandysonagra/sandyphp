<?php
session_start();

// echo "welcome".$_SESSION['email'];

include("connection.php");


if (isset($_POST["Login"])) {

  $email = $_POST["lemail"];
  $password = $_POST["lpassword"];


  $sql = "SELECT * FROM `sessioninformation` WHERE EMAIL = '$email' && PASSWORD = '$password' ";


  $result = mysqli_query($conn, $sql);

  $total = mysqli_num_rows($result);



  if ($total == 1) {
    # code...
    // $_SESSION['email'] = $email;

    header("location:table.php");
    // <meta http-equiv = "refresh" content = "20; url = https://ide.geeksforgeeks.org"/>
    // echo "can't find user";
  } else if ($total == 0) {
    // echo "can't find user";
    header("location:loginform.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>SESSION</title>
  <!-- <link rel="stylesheet" href="loginstyle.css"> -->

</head>

<body>
  <!-- partial:index.partial.html -->
  <section>
    <div class="form-box">
      <div class="form-value">

        <form action="loginform.php" method="post">
          <h2>Login</h2>

          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="lemail" required>
            <label for="">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="lpassword" required>
            <label for="">Password</label>
          </div>
          <div class="forget">
            <label>
              <input type="checkbox"> Remember me
            </label>
            <label>
              <a href="#" onclick="message()">Forgot password?</a>
            </label>
          </div>
          <button name="Login">Log in</button>
          <!-- <input type="submit" class="btn" value="Login" name="login" > -->

          <div class="register">
            <p>Don't have a account ? <a href="form_validation.php" onclick="register()">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>

  <script>
    function message() {
      alert('UNDER MAINTAINANCE.......');
    }

    function register() {
      alert('PLEASE FILL FORM CAREFULLY.....');
    }
  </script>
</body>

</html>