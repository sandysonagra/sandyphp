<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="fourth_page.php">
    <?php 

        $hiddenname=$_GET['hiddenname'];
        // print_r($_GET['hiddenname']);
        // print_r($_GET);

        $conut=0;
        for ($i=1; $i <=$hiddenname ; $i++) { 
            $valuetext='numberbox'.$i;
            $value=$_GET[$valuetext] ?? '';

            if (!empty($value)) {
                $conut++;
            ?>
                <label for="value"> Value <?php echo $i;  ?></label>
                <input type="text"  name="<?php echo $value ;?>" value="<?php echo $value;?>" readonly>
                <input type="checkbox" name="checkbox[]" value="<?php echo $value;?>" ></br>
            <?php
            }

        }
        if ($conut < 3) {
            header('location:second_page.php?numberbox='.$hiddenname.'');
        }
        else{
            echo " <button type='submit'>Submit</button>";
        }

    ?>
    <button type="button" name="checkall" onclick="allcheck()">Check All</button>
    <button type="button" name="clearall" onclick="allclear()">Clear All</button>
    </form>
    <script>

        function allcheck(){
            var checkboxes = document.getElementsByName('checkbox[]');
            checkboxes.forEach((checkbox)=>{
                checkbox.checked = true;
            })
           
        }

        function allclear(){
            var checkboxes = document.getElementsByName('checkbox[]');
            checkboxes.forEach((checkbox)=>{
                checkbox.checked = false;
            })
           
        }

    </script>
</body>
</html>