<?php

$height = 5;

for ($row = 1; $row <= $height; $row++) {
    for ($space = $height - $row; $space > 0; $space--) {
        echo "&nbsp ";
    }
    for ($col = 1; $col <= 2 * $row - 1; $col++) {
        echo $col;

    }
    echo "<br>";
}
for ($row = 4; $row >= 1; $row--) {
    for ($space = $height - $row; $space > 0; $space--) {
        echo "&nbsp ";
    }
    for ($col = 1; $col <= 2 * $row - 1; $col++) {
        echo $col;

    }
    echo "<br>";
}

$i = 1;
// echo$i++; 
// echo++$i;

for ($col = 1; $col <= 6; $col++) {
    for ($i = 1; $i <= 7 - $col; $i++) {
        echo chr($col + 64);
    }
    echo "<br>";

}
;

$num = 1;
for ($col = 1; $col <= 5; $col++) {
    for ($i = 1; $i <= 6 - $col; $i++) {

        if ($col == 3 || $col == 4 || $col == 5) {
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $num++;
            // ++$num;

        } else {
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $num++;
            // ++$num;
        }

    }
    echo "<br>";

}
;
?>