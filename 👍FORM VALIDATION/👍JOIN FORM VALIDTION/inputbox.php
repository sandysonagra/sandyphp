<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .fnameError{
        color: red;
    }
</style>

<body align='center'>
    <form method="post" action="Validation_inputbox.php" enctype="multipart/form-data">

        PRODUCT:
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
    <br>
    <input type="hidden" name="update" value="<?php  if (isset($_GET['updateid'])) {
  
  echo $_GET['updateid'];
  // echo $updateid; 
}

if (isset($_GET['no'])) {
  $no = $_GET['no'];
  echo $no;
}
      ?>">
 

      <button type="submit" name="submit">SUBMIT</button>
      <button type="submit" name="update_data">UPDATE</button>



    </form>

</body>

</html>