<?php 
include('topmenu.php');
session_start();
session_unset();
session_destroy();
header('location:index.php');
?>
<h1>Logout</h1>