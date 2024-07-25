<?php
session_start();

if(isset($_SESSION['email'])){
  header('Location: LOGIN_TABLE.php');

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> LOGIN_FORM</title>
  <link rel="stylesheet" href="loginstyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .UsernameError {
      color: red;
    }

    .passwordError {
      color: red;
    }

    .emailError {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="LOGIN_INSERT.php" method="post">
        
        <div class="user-details">

          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" value="<?php if (isset($_GET['fname'])) {
              echo $_GET['fname'];
            }
            ?>">
            <div class="UsernameError">
              <?php
              if (isset($_GET['nameerror'])) {
                echo $_GET['nameerror'];
              }
              ?>
            </div>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your Email" name="email" value="<?php if (isset($_GET['gmailreturn'])) {
              echo $_GET['gmailreturn'];
            } ?>">
            <div class="emailError">
              <?php
              if (isset($_GET['gmailerror'])) {
                echo $_GET['gmailerror'];
              }
              ?>
            </div>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="Password" placeholder="Enter your Password" name="password" value="<?php if (isset($_GET['pass'])) {
              echo $_GET['pass'];
            } ?>">
            <div class="passwordError">
              <?php
              if (isset($_GET['passworderror'])) {
                echo $_GET['passworderror'];
              }
              ?>
            </div>
          </div>



        </div>
        <input type="hidden" name="update" value="<?php if (isset($_GET['ID'])) {

          echo $_GET['ID'];
          // echo $updateid; 
        }

        if (isset($_GET['upadateid'])) {
          $no = $_GET['upadateid'];
          echo $no;
        }
        ?>">
        <div class="button">

          <?php
          if (!isset($_GET['ID'])) {
            echo "<input type='submit' name='submit' value='Register'>";
          }
          if (isset($_GET['ID'])) {
            echo "<input type='submit' name='update_data' value='Update'>";
          }
          if(isset($_GET['upadateid'])) {
            echo "<input type='submit' name='update_data' value='Update'>";

          }


          ?>


        </div>
      </form>
    </div>
  </div>

</body>

</html>