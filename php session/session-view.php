<?php

session_start();

print_r($_SESSION);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session</title>
</head>

<body>
    <?php
if ( isset($_SESSION["favcolor"])) {
    # code...
    echo "Favourite color:" . $_SESSION["favcolor"];
}

    ?>
</body>

</html>