<?php

echo "welcome to the for each loops <br>";

$arr = array('bananas', 'apples', 'harpic', 'bread', 'grapes');

// for ($i=0; $i < count($arr); $i++) { 
//         echo  $arr[$i];
//         echo  "<br>";
// }

foreach ($arr as  $value) {
    # code...
    echo "$value <br>";
}
?>