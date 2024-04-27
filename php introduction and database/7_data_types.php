<?php
    $name = "sandip";
    $income = 10000;

    /*php data types........
        1.string
        2.integer
        3.float
        4.boolean
        5.object
        6.array
        7.NULL
    */

    //string = sequence of characters

    $name = "sandy";
    $friend = "sandip";

    echo "$name is $friend";
    echo "<br>";

    //integer = non decimal number
    $income = 545;
    $debts = 645;

    echo $income;
    echo "<br>";
    echo $debts;
    echo "<br>";


    //float = decimal point number

    $income = 344.5;
    $debts = 45.5;

    echo $income;
    echo "<br>";
    echo $debts;
    echo "<br>";

    //boolean =can be either true or false

    $x = true;
    $y = false;

    echo var_dump($x);
    echo "<br>";
    echo var_dump($y);
    echo "<br>";

    //object = instanses of classes

    //array - se to dtore multiple value in a single variable   

    $friends = array("sandip", "kuldip", "bhavesh", "meet");
    echo var_dump($friends);
    echo "<br>";
    echo var_dump($friends[0]);
    echo "<br>";
    echo var_dump($friends[1]);
    echo "<br>";
    echo var_dump($friends[2]);
    echo "<br>";
    echo var_dump($friends[3]);
    echo "<br>";
    

    //NULL 
    $name = NULL;
    echo $name;
    echo var_dump($name);
    




?>