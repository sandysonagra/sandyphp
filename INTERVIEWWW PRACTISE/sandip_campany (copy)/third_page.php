<!doctype html>
<html lang="en">

<head>
  <title>PAGE 3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <form action="fourth_page.php" method="post">
      <?php
      $hiddenname = $_GET['hiddenname'];
      // print_r($hiddenname  );
      // exit();
      // print_r($_GET)
      $count = 0;
      for ($i = 1; $i <= $hiddenname; $i++) {
        $valuetext = 'numberbox' . $i;
        // print_r($valuetext);
        $value = $_GET[$valuetext] ?? '';
        // print_r($value);
      
        if (!empty($value)) {
          $count++;
          ?>
          <label for="value">Value : <?php echo $i ?></label>
          <input type="text" name="<?php echo $value ?>" value="<?php echo $value ?>" class="form-control">
          <input type="checkbox" name="checkbox[]" value="<?php echo $value ?>"><br>
          <?php
        }
      }
      if ($count < 3) {
        header('location:second_page.php?numberbox=' . $hiddenname . '');
      } else {
        echo '<button type="submit" class="form-control btn btn-success" >SUBMIT</button>';
      }
      ?>
      <button type="button" name="checkall" onclick="allcheck()" class="form-control btn btn-warning">Check All</button>
      <button type="button" name="clearall" onclick="allclear()" class="form-control btn btn-danger">Clear All</button>
    </form>
  </div>
  <script>
    function allcheck() {
      var checkboxes = document.getElementsByName('checkbox[]');
      checkboxes.forEach((checkbox) => {
        checkbox.checked = true;
      })
    }
    function allclear() {
      var checkboxes = document.getElementsByName('checkbox[]');
      checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
      })
    }
  </script>
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