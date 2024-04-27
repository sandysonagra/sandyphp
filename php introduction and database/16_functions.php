<?php

echo "welcome to function";

function processMarks($marksarr){
    $sum = 0;

    foreach ($marksarr as  $value) {
        # code...
        $sum += $value; 
    }
    return $sum;
}

$rohandas = [34, 98, 45, 12, 98, 93];
$sumMarks = processMarks($rohandas);

$sandy = [99, 98, 93, 94, 17, 100];
$sumMarksSandy = processMarks($sandy); 
echo "total mark scored by rohan out of  600 is $sumMarks <br>";
echo "total mark scored by rohan out of  600 is $sumMarksSandy";
?>