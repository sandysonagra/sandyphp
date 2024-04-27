<?php

$personaldetails = [
    'personaldetails' =>  ['firstname' => 'sandip', 'lastname' => 'sonagra', 'email' => 'sonagrasandip0963@gmail.com'],
    'education' => ['SSC' => '10', 'HSC' => '12', 'GRADUATE' => 'B.COM'] ];
echo "<pre>";
print_r($personaldetails);
 
 $personaldetails['personaldetails']['lastname'] = 'dalwadi';
 echo "<pre>";
print_r($personaldetails);

?>