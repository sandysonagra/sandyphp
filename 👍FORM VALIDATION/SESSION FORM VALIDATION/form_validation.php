
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Session </title>
  <link rel="stylesheet" href="style.css">
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
      <form action="output2.php" method="post">
        <?php
        include("connection.php");
        ?>
        <div class="user-details">

          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" value="<?php if (isset($_GET['username'])) {
                                                                                          echo $_GET['username'];
                                                                                        }
                                                                                        ?>">
            <div class="UsernameError">
              <?php
              if (isset($_GET['eusername'])) {
                echo $_GET['eusername'];
              }
              ?>
            </div>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your Email" name="email" value="<?php if (isset($_GET['emailre'])) {
                                                                                        echo $_GET['emailre'];
                                                                                      } ?>">
            <div class="emailError">
              <?php
              if (isset($_GET['email'])) {
                echo $_GET['email'];
              }
              ?>
            </div>
          </div>

          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="Password" placeholder="Enter your Password" name="password" value="<?php if (isset($_GET['password'])) {
                                                                                            echo $_GET['password'];
                                                                                          } ?>">
            <div class="passwordError">
              <?php
              if (isset($_GET['epassword'])) {
                echo $_GET['epassword'];
              }
              ?>
            </div>
          </div>



        </div>
        <input type="hidden" name="update" value="<?php if (isset($_GET['id'])) {

                                                    echo $_GET['id'];
                                                    // echo $updateid; 
                                                  }

                                                  if (isset($_GET['no'])) {
                                                    $no = $_GET['no'];
                                                    echo $no;
                                                  }
                                                  ?>">
        <div class="button">

          <?php
          if (!isset($_GET['id'])) {
            echo "<input type='submit' name='submit' value='Register'>";
          }
          if (isset($_GET['id'])) {
            echo "<input type='submit' name='update_data' value='Update'>";
          }


          ?>


        </div>
      </form>
    </div>
  </div>
<script>
  function register() {
    alert('PLEASE FILL FORM CAREFULLY.....');
  }
  </script>
</body>

</html>