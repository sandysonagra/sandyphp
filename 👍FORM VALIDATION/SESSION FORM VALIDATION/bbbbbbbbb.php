<?php

include("connection.php");


if (isset($_POST["login"])) {
  # code...

  $username = $_POST["lemail"];
  $password = $_POST["lpassword"];


  $sql = "SELECT * FROM `sessioninformation` WHERE EMAIL = '$username' && PASSWORD = '$password' ";


  $result = mysqli_query($conn, $sql);

  $total = mysqli_num_rows($result);
//   // echo $total;
  if ($total == 0) {
    # code...
    header("location:loginform.php");
    // echo "can't find user";
  }
  else if ($total == 1) {
    header("location:table.php");
  }
  
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Animated Login form</title>
  <link rel="stylesheet" href="loginstyle.css">

</head>
<body>
<!-- partial:index.partial.html -->

<div class="container">
  <div class="login-box">
    <h2>Login</h2>
    <form action="loginform.php" method="post" autocomplete="off">
      <div class="input-box">
        <input type="email" name="lemail" required>
        <label>Email</label>
      </div>
      <div class="input-box">
        <input type="password" name="lpassword" required>
        <label>Password</label>
      </div>
      <div class="forgot-password" onclick="message()" >
        <a href="#">Forgot Password?</a>
      </div>
      <!-- <button type="submit" class="btn" name="login">Login</button> -->
      <input type="submit" class="btn" value="Login" name="login" >
      
      <div class="signup-link" onclick="register()">
        <a href="form_validation.php">Signup</a>
      </div>
    </form>
  </div>

  <span style="--i:0;"></span>
  <span style="--i:1;"></span>
  <span style="--i:2;"></span>
  <span style="--i:3;"></span>
  <span style="--i:4;"></span>
  <span style="--i:5;"></span>
  <span style="--i:6;"></span>
  <span style="--i:7;"></span>
  <span style="--i:8;"></span>
  <span style="--i:9;"></span>
  <span style="--i:10;"></span>
  <span style="--i:11;"></span>
  <span style="--i:12;"></span>
  <span style="--i:13;"></span>
  <span style="--i:14;"></span>
  <span style="--i:15;"></span>
  <span style="--i:16;"></span>
  <span style="--i:17;"></span>
  <span style="--i:18;"></span>
  <span style="--i:19;"></span>
  <span style="--i:20;"></span>
  <span style="--i:21;"></span>
  <span style="--i:22;"></span>
  <span style="--i:23;"></span>
  <span style="--i:24;"></span>
  <span style="--i:25;"></span>
  <span style="--i:26;"></span>
  <span style="--i:27;"></span>
  <span style="--i:28;"></span>
  <span style="--i:29;"></span>
  <span style="--i:30;"></span>
  <span style="--i:31;"></span>
  <span style="--i:32;"></span>
  <span style="--i:33;"></span>
  <span style="--i:34;"></span>
  <span style="--i:35;"></span>
  <span style="--i:36;"></span>
  <span style="--i:37;"></span>
  <span style="--i:38;"></span>
  <span style="--i:39;"></span>
  <span style="--i:40;"></span>
  <span style="--i:41;"></span>
  <span style="--i:42;"></span>
  <span style="--i:43;"></span>
  <span style="--i:44;"></span>
  <span style="--i:45;"></span>
  <span style="--i:46;"></span>
  <span style="--i:47;"></span>
  <span style="--i:48;"></span>
  <span style="--i:49;"></span>
</div>
<!-- partial -->

<script>
  function message() {
    alert('UNDER MAINTENANCE.......');
  }

  function register() {
    alert('PLEASE FILL FORM CAREFULLY.....');
  }
</script>
  
</body>
</html>



