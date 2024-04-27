
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="s.css"> -->
  <title>form validation in php</title>
</head>


<style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 10px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        img {
            max-width: 200px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .fnameError,
        .lastnameError,
        .emailError,
        .addressError,
        .genderError,
        .gameError,
        .image,
        .photo {
            color: red;
        }

</style>

<body>

  <h1>PHP FORM VALIDATION</h1>
  <!-- <div class="card">
    <div class="circle" style="--clr : #f40103"></div>
    <div class="content">
      <h2>coca cola</h2>
      <p>lorem 30</p>
      <a href="3">Explore more</a>
    </div>
    <div > -->
  <!-- </div> -->

  <form method="post" action="output2.php" enctype="multipart/form-data">
    <?php
    // if (isset($_GET['updateid'])) {

    // $updateid=$_GET['updateid'];
    // echo $updateid;
    // exit;
    // }   


    include("connection.php");
    ?>
    first Name:
    <input type="text" name="name" value="<?php if (isset($_GET['name'])) {
                                            echo $_GET['name'];
                                          }
                                          ?>">
    <div class="fnameError">
      <?php
      if (isset($_GET['fname'])) {
        echo $_GET['fname'];
      }
      ?>
    </div>
    <br><br>


    last name: <input type="text" name="lname" value="<?php if (isset($_GET['lname'])) {
                                                        echo $_GET['lname'];
                                                      } ?>">
    <div class="lastnameError">
      <?php
      if (isset($_GET['lastname'])) {
        echo $_GET['lastname'];
      }
      ?>
    </div>
    <br><br>


    E-mail: <input type="text" name="email" value="<?php if (isset($_GET['emailre'])) {
                                                      echo $_GET['emailre'];
                                                    } ?>">
    <div class="emailError">
      <?php
      if (isset($_GET['email'])) {
        echo $_GET['email'];
      }
      ?>
    </div>
    <br><br>

    <!-- address: <textarea name="address" rows="1" cols="43"> if (isset($_GET['addressre'])) {echo $_GET['addressre'];} ?></textarea> -->
    AREA : <textarea name="address" rows="1" cols="43"><?php if (isset($_GET['addressre'])) {
                                                          echo $_GET['addressre'];
                                                        } ?></textarea><br>
    <div class="addressError">
      <?php
      if (isset($_GET['address'])) {
        echo htmlspecialchars($_GET['address']);
      }
      ?>
    </div>
    <br><br>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM information WHERE ID = $id";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['SIGN'];
      }
    ?>
      <img src="<?php echo $image; ?>" alt="Image" width="200">
    <?php
    }
    ?>

    
    SIGN : <input type="file" name="image" class="image" />
    <br><br>



    Gender:
    <input type="radio" name="gender" value="male" <?php
                                                    if (isset($_GET['genderre'])) {
                                                      if ($_GET['genderre'] == "male") {
                                                        echo "checked";
                                                      }
                                                    }
                                                    ?>>male
    <input type="radio" name="gender" value="female" <?php
                                                      if (isset($_GET['genderre'])) {
                                                        if ($_GET['genderre'] == "female") {
                                                          echo "checked";
                                                        }
                                                      } ?>>Female
    <input type="radio" name="gender" value="other" <?php
                                                    if (isset($_GET['genderre'])) {
                                                      if ($_GET['genderre'] == "other") {
                                                        echo "checked";
                                                      }
                                                    } ?>>Other


    <div class="genderError">
      <?php
      if (isset($_GET['gender'])) {
        echo $_GET['gender'];
      }
      ?>
    </div>
    <br> <br>

    Games:
    <input type="checkbox" name="game[]" value="BGMI" <?php
                                                      for ($i = 0; $i <= 5; $i++) {
                                                        if (isset($_GET['gamere'][$i])) {
                                                          if ($_GET['gamere'][$i] == 'BGMI') {
                                                            # code...
                                                            echo "checked";
                                                          }
                                                        }
                                                      }
                                                      ?>>BGMI
    <input type="checkbox" name="game[]" value="PUBG" <?php
                                                      for ($i = 0; $i <= 5; $i++) {
                                                        if (isset($_GET['gamere'][$i])) {
                                                          if ($_GET['gamere'][$i] == 'PUBG') {
                                                            # code...
                                                            echo "checked";
                                                          }
                                                        }
                                                      }
                                                      ?>>PUBG
    <input type="checkbox" name="game[]" value="FREE FIRE" <?php
                                                            for ($i = 0; $i <= 5; $i++) {
                                                              if (isset($_GET['gamere'][$i])) {
                                                                if ($_GET['gamere'][$i] == 'FREE FIRE') {
                                                                  # code...
                                                                  echo "checked";
                                                                }
                                                              }
                                                            }
                                                            ?>>FREE FIRE
    <input type="checkbox" name="game[]" value="CALL OF DUTY" <?php
                                                              for ($i = 0; $i <= 5; $i++) {
                                                                if (isset($_GET['gamere'][$i])) {
                                                                  if ($_GET['gamere'][$i] == 'CALL OF DUTY') {
                                                                    # code...
                                                                    echo "checked";
                                                                  }
                                                                }
                                                              }
                                                              ?>>CALL OF DUTY
    <input type="checkbox" name="game[]" value="CLASH OF CLANS" <?php
                                                                for ($i = 0; $i <= 5; $i++) {
                                                                  if (isset($_GET['gamere'][$i])) {
                                                                    if ($_GET['gamere'][$i] == 'CLASH OF CLANS') {
                                                                      # code...
                                                                      echo "checked";
                                                                    }
                                                                  }
                                                                }
                                                                ?>>CLASH OF CLANS
    <input type="checkbox" name="game[]" value="MINECRAFT" <?php
                                                            for ($i = 0; $i <= 5; $i++) {
                                                              if (isset($_GET['gamere'][$i])) {
                                                                if ($_GET['gamere'][$i] == 'MINECRAFT') {
                                                                  # code...
                                                                  echo "checked";
                                                                }
                                                              }
                                                            }
                                                            ?>>MINECRAFT


    <div class="gameError">
      <?php
      if (isset($_GET['game'])) {
        # code...
        echo $_GET['game'];
      }
      ?>
    </div>
    <br>


    <input type="hidden" name="update" value="<?php if (isset($_GET['id'])) {

                                                echo $_GET['id'];
                                                // echo $updateid; 
                                              }

                                              if (isset($_GET['no'])) {
                                                $no = $_GET['no'];
                                                echo $no;
                                              }
                                              ?>">
      <button type="submit" name="submit" class="btn">SUBMIT</button>
        <button type="submit" name="update_data" class="btn">UPDATE</button>
        <a href="form_validation.php" class="btn" style="background-color: #ffc107; color: #333;">RELOAD</a>


  </form>

  </div>
</body>

</html>