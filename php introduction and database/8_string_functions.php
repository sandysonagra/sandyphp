<?php

$name = "sandip is a good boy";
echo $name;
echo "<br>";

echo "the length of my string is :-" . strlen($name);
echo "<br>";

echo "the count of word in my variable :-" . str_word_count($name);
echo "<br>";



echo strpos($name , "is");
echo "<br>";
echo strpos($name , "jd");
echo "<br>";
echo strpos($name , "boy");
echo "<br>";

echo str_replace("sandip", "yogesh", $name);
echo "<br>";

echo str_repeat($name , 9);
echo "<br>";

echo rtrim("<pre>              this guy is a good </pre> ")







?>