<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation in Join</title>
  <style>
    .fnameError,
    .lastnameError,
    .emailError,
    .addressError,
    .genderError,
    .gameError,
    .image,
    .photo,
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <h1>JOIN FORM VALIDATION</h1>

  <form method="post" action="joinoutput.php" enctype="multipart/form-data">

    First Name:
    <input type="text" name="name" value="<?php if (isset($_GET['name'])) { echo $_GET['name']; } ?>">
    <div class="fnameError">
      <?php if (isset($_GET['fname'])) { echo $_GET['fname']; } ?>
    </div>
    <br><br>

    Last Name:
    <input type="text" name="lname" value="<?php if (isset($_GET['lname'])) { echo $_GET['lname']; } ?>">
    <div class="lastnameError">
      <?php if (isset($_GET['lastname'])) { echo $_GET['lastname']; } ?>
    </div>
    <br><br>

    E-mail:
    <input type="text" name="email" value="<?php if (isset($_GET['emailre'])) { echo $_GET['emailre']; } ?>">
    <div class="emailError">
      <?php if (isset($_GET['email'])) { echo $_GET['email']; } ?>
    </div>
    <br><br>

    AREA:
    <textarea name="address" rows="1" cols="43"><?php if (isset($_GET['addressre'])) { echo $_GET['addressre']; } ?></textarea><br>
    <div class="addressError">
      <?php if (isset($_GET['address'])) { echo htmlspecialchars($_GET['address']); } ?>
    </div>
    <br><br>

    PRODUCT:
    <select name="product">
      <option value="">
        <?php
        $mysqli = new mysqli('localhost', 'username', 'password', 'sandy_php_projects');

        if ($mysqli->connect_error) {
          die('Connection failed: ' . $mysqli->connect_error);
        }

        $query = "SELECT * FROM `product`";
        $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['ID'] . '"';
          if (isset($_GET['productre'])) {
            if ($_GET['productre'] == $row['ID']) {
              echo 'selected';
            }
            if (isset($_GET['productre'])) {
            if ($_GET['productre'] == $row['PRODUCT']) {
              echo 'selected';
            }
          }
          }
          echo '>' . $row['PRODUCT'] . '</option>';
        }
        ?>
      </option>
    </select>
    <div>
      <span class="error">
        <?php if (isset($_GET["producterror"])) { echo $_GET["producterror"]; }
        ?>
      </span>
    </div>
    <br><br>

    SIGN:
    <input type="file" name="image" class="image" />
    <br><br>


    Gender:
    <input type="radio" name="gender" value="male" <?php if (isset($_GET['genderre']) && $_GET['genderre'] == "male") { echo "checked"; } ?>>Male
    <input type="radio" name="gender" value="female" <?php if (isset($_GET['genderre']) && $_GET['genderre'] == "female") { echo "checked"; } ?>>Female
    <input type="radio" name="gender" value="other" <?php if (isset($_GET['genderre']) && $_GET['genderre'] == "other") { echo "checked"; } ?>>Other
    <div class="genderError">
      <?php if (isset($_GET['gender'])) { echo $_GET['gender']; } ?>
    </div>
    <br><br>

    Games:
    <input type="checkbox" name="game[]" value="BGMI" <?php if (isset($_GET['gamere']) && in_array('BGMI', $_GET['gamere'])) { echo "checked"; } ?>>BGMI
    <input type="checkbox" name="game[]" value="PUBG" <?php if (isset($_GET['gamere']) && in_array('PUBG', $_GET['gamere'])) { echo "checked"; } ?>>PUBG
    <input type="checkbox" name="game[]" value="FREE FIRE" <?php if (isset($_GET['gamere']) && in_array('FREE FIRE', $_GET['gamere'])) { echo "checked"; } ?>>FREE FIRE
    <input type="checkbox" name="game[]" value="CALL OF DUTY" <?php if (isset($_GET['gamere']) && in_array('CALL OF DUTY', $_GET['gamere'])) { echo "checked"; } ?>>CALL OF DUTY
    <input type="checkbox" name="game[]" value="CLASH OF CLANS" <?php if (isset($_GET['gamere']) && in_array('CLASH OF CLANS', $_GET['gamere'])) { echo "checked"; } ?>>CLASH OF CLANS
    <input type="checkbox" name="game[]" value="MINECRAFT" <?php if (isset($_GET['gamere']) && in_array('MINECRAFT', $_GET['gamere'])) { echo "checked"; } ?>>MINECRAFT
    <div class="gameError">
      <?php if (isset($_GET['game'])) { echo $_GET['game']; } ?>
    </div>
    <br>

    <input type="hidden" name="update" value="<?php if (isset($_GET['updateid'])) { echo $_GET['updateid']; }
    if (isset($_GET['no'])) { $no = $_GET['no']; echo $no; }
    ?>">
    <button type="submit" name="submit">SUBMIT</button>
    <button type="submit" name="update_data">UPDATE</button>
    <button class="btn btn-warning my-5"><a class="text-light" href="join_form_validation.php">RELOAD</a></button>
  </form>
</body>

</html>
