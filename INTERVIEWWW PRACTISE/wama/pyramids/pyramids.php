<?php

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br/>";
}

?>

<?php

for ($i = 1; $i <= 5; $i++) {
    for ($j = 5; $j >= $i; $j--) {
        echo "* ";
    }
    echo "<br/>";

}

?>

<?php

$size = 5;

for ($i = 1; $i <= $size; $i++) {
    for ($j = 1; $j <= $size - $i; $j++) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "*&nbsp;&nbsp;";
    }
    echo "<br />";

}

?>


<?php

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        echo "* ";
    }
    echo "<br />";

}

?>



<?php

$n = 1;

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $n . " ";
    }
    $n = $n + 1;
    echo "<br/>";
}

?>

<?php

$n = 1;

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $n . " ";
        $n = $n + 1;
    }
    echo "<br/>";

}

?>

<?php

$n = 65;

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr($n) . " ";
    }
    $n = $n + 1;
    echo "<br/>";
}


?>


<?php

$height = 5;

for ($row = 1; $row <= $height; $row++) {
    for ($space = $height - $row; $space > 0; $space--) {
        echo "&nbsp; ";
    }
    for ($col = 1; $col <= 2 * $row - 1; $col++) {
        echo $col;
    }
    echo "<br/>";
}
for ($row = 4; $row >= 1; $row--) {
    for ($space = $height - $row; $space > 0; $space--) {
        echo "&nbsp; ";
    }
    for ($col = 1; $col <= 2 * $row - 1; $col++) {
        echo $col;
    }
    echo "<br/>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <h3>Chess Board using Nested For Loop</h3>
    <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
        <!-- cell 270px wide (8 columns x 60px) -->
        <?php
        // Outer loop for rows
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>"; // Start a new table row
        
            // Inner loop for columns
            for ($col = 1; $col <= 8; $col++) {
                // Calculate total sum of row and column indices
                $total = $row + $col;

                // Check if total is even or odd to determine cell color
                if ($total % 2 == 0) {
                    // If total is even, set cell background color to white
                    echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
                } else {
                    // If total is odd, set cell background color to black
                    echo "<td height=30px width=30px bgcolor=#000000></td>";
                }
            }

            echo "</tr>"; // End the table row
        }
        ?>
    </table>
</body>

</html>