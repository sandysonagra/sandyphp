<?php


session_start();

include ('con.php');

if (isset($_GET['editid'])) {
  $id = $_GET['editid'];
  $sql = "SELECT * FROM  `session_crud_by_sandip_fourth_time` WHERE `id`=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['value'] = $row;
}

?>


<!doctype html>
<html lang="en">

<head>
  <title>FORM</title>
  <style>
    .error {
      color: red;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <center>
      <h2>FORM</h2>
    </center>
    <form action="validation.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">NAME :</label>
        <input type="text" name="name" class="form-control"
          value="<?php echo isset($_SESSION['value']['name']) ? $_SESSION['value']['name'] : '' ?>">
        <div class="error"><?php echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '' ?></div>
      </div>
      <div class="form-group form-control">
        <label for="gender">GENDER :</label>
        <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'male' ? 'checked' : '' ?>>Male
        <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'female' ? 'checked' : '' ?>>Female
        <input type="radio" name="gender" value="other" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'other' ? 'checked' : '' ?>>Other
        <div class="error"><?php echo isset($_SESSION['error']['gender']) ? $_SESSION['error']['gender'] : '' ?></div>
      </div><br>
      <div class="form-group">
        <label for="photo">PHOTO :</label>
        <input type="file" name="photo" class="form-control">
        <div class="error"><?php echo isset($_SESSION['error']['photo']) ? $_SESSION['error']['photo'] : '' ?></div>
      </div>
      <?php

      if(isset($_GET['editid']) || $_GET['updateid'] != "" )
      {
        
        echo '<input type="submit" name="update" value="UPDATE" class="btn btn-warning">';
      }
      else
      {

        echo '<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">';
      }


      ?>
      <input type="hidden" name="hidden" value="<?php echo isset($_GET['editid']) ? $_GET['editid'] : '';
      echo isset($_GET['updateid']) ? $_GET['updateid'] : '' ?>">
    </form>
  </div>
  <?php
  session_destroy();
  ?>

  <div class="container">
    <center>
      <h3>ALL DATA </h3>
    </center>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>gender</th>
          <th>photo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "SELECT * FROM  `session_crud_by_sandip_fourth_time`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><img src="images/<?= $row['photo'] ?>" height="100px" width="100px"></td>
            <td>
              <button class="btn btn-success"><a href="index.php?editid=<?= $row['id'] ?>"
                  class="text-light">EDIT</a></button>
              <button class="btn btn-danger"><a href="validation.php?deleteid=<?= $row['id'] ?>"
                  class="text-light">DELETE</a></button>
            </td>
          </tr>
          <?php
        }
        ?>

      </tbody>
    </table>
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
</body>

</html>