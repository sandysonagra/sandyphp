<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="third_page.php" method="get">
    <?php

        $Number=$_POST['number'];
        
        if(isset($_POST['number'])){
            if ($Number < 3) {
                header('location:first_page.php');
            }
        }

        
        // echo $Number;
        if (isset($_GET['numberbox'])) {
            $Number=$_GET['numberbox'];
            echo '<div class="alert alert-danger" role="alert">
            Please input values in at least 3 textboxes.
                  </div>';
        }

        for ($i=1; $i <= $Number; $i++) { 
            ?>
            <label for="numberbox">Enter Number box <?php echo $i;  ?></label>
            <input type="text" name="numberbox<?php echo $i;  ?>"></br>
            <?php
        }
        ?>
        <input type="hidden" name="hiddenname" value="<?php echo isset($Number)? $Number :'' ?>" >
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>