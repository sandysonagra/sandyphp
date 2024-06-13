

<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="s.css"> -->
    <title>form validation in php</title>
  </head>
  

  <style>
      .error{
        color: red;
      }


  </style>

  <body >

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

    <form method="post" action="oopoutput.php" enctype="multipart/form-data" >
    <?php
    // if (isset($_GET['updateid'])) {
  
      // $updateid=$_GET['updateid'];
      // echo $updateid;
      // exit;
        // }   
    ?>
      first Name:
      <input type="text" name="name" value="<?php if (isset($_GET['name'])) {
                                              echo $_GET['name'];
                                            }
                                            ?>">
      <div class="error">
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
      <div class="error">
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
      <div class="error">
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
      <div class="error">
        <?php
        if (isset($_GET['address'])) {
          echo htmlspecialchars($_GET['address']);
        }
        ?>
      </div>
      <br><br>
<!-- 
       SIGN :  <input type="file" name="image" class="image" /> 
        <br><br> -->
        

        <!-- IMAGE :  <input type="file" name="photo" class="photo" /> 
        <br><br> -->


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


      <div class="error">
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


      <div class="error">
        <?php
        if (isset($_GET['game'])) {
          # code...
          echo $_GET['game'];
        }
        ?>
      </div>
      <br>


      <input type="hidden" name="update" value="<?php  if (isset($_GET['updateid'])) {
  
  $id= $_GET['updateid'];
  echo $id; 
}
if (isset($_GET['no'])) {
  $no = $_GET['no'];
  echo $no;
}
      ?>">
      <button type="submit" name="submit">SUBMIT</submit>
      
      <button type="submit" name="update_data">UPDATE</button>
      


      <button class="btn btn-warning my-5"><a class="text-light" href="oopsform_validation.php">RELOAD</a></button>


    </form>
    
    </div>
  </body>

  </html>