<?php
//operators in php

$a = 10;
$b = 20;


//1. arithmatic operator
echo " for a + b , the result is" . $a + $b . "<br>";
echo $a + $b . "<br>";
echo " for a - b , the result is" . $a - $b . "<br>";
echo $a - $b . "<br>";
echo " for a * b , the result is" . $a * $b . "<br>";
echo $a * $b . "<br>";
echo " for a / b , the result is" . $a / $b . "<br>";
echo $a / $b . "<br>";


//2.assignment operator
    $x = $a;
    echo " for a  , the value is" . $x . "<br>";



    //4.logical operator

    $m = true;
    $n = false;
    
    echo " for m and n , the result is";
    echo var_dump($m and $n);
    echo "<br>" ;
    echo " for m and n , the result is";
    echo var_dump($m or $n);
    echo "<br>";


    
?>