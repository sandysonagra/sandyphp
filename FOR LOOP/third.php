<?php

for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5-$i; $j++) {
        echo "&nbsp&nbsp";
    }
    for ($k = 0; $k <= $i; $k++) {
        echo "*&nbsp&nbsp";
    }
    echo "<br>";
}

//Star Pyramid Size
// $size = 5;
// for($i=1;$i<=$size;$i++){
//     for($j=1;$j<=$size-$i;$j++){
//         echo "&nbsp;&nbsp;";
//     }
//     for($k=1;$k<=$i;$k++){
//                 echo "*&nbsp;&nbsp;";
//     }
// echo "<br />";
// }
?>