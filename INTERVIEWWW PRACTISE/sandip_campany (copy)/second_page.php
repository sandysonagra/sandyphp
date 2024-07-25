<!doctype html>
<html lang="en">

<head>
  <title>PAGE 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <form action="third_page.php" method="get">
      <?php

      $Number = $_POST['number'];

if(isset($_GET['numberbox']))
{
  $Number = $_GET['numberbox'];
  echo '<div class="alert alert-danger" role="alert">
  Please input values in at least 3 textboxes.
        </div>';
}

      for ($i = 1; $i <= $Number; $i++) {
        ?>
        <label for="numberbox">Enter Number Box : <?php echo $i ?></label>
        <input type="text" name="numberbox<?php echo $i ?>" class="form-control">
        <?php
      }
      ?><br>

      <input type="hidden" name="hiddenname" value="<?php echo isset($Number) ? $Number : '' ?>">
      <button type="submit" class="form-control btn btn-success">SUBMIT</button>

    </form>
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