<?php


include('model.php');

$obj = new model();

if (isset($_POST['submit'])) {
    $obj->insertRecord($_POST);
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATIONS IN PHP OOPS</title>


    <style>
        form{
        background-color:rgb(12, 12, 12);
        color: white;
        width: 35%;
        margin: 120px auto;
        padding: 40px;
        box-shadow: 2px 6px 10px rgb(242, 240, 245);
        border-radius: 23PX;
        box-sizing: border-box;
        
    }
    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>


</head>
<body><br>
    
<h2 class="text-center text-center-info" >CRUD OPERATIONS IN PHP OOPS</h2><br>

<form method="post" action="index.php" >
    
      
      <label >first Name:</label>
      <input type="text" name="name" ><br>
      

      
        <label for="">last name:</label>
       <input type="text" name="lname" ><br>

        <label for="">E-mail: </label>
      <input type="text" name="email"><br>
      
      <!-- address: <textarea name="address" rows="1" cols="43"> if (isset($_GET['addressre'])) {echo $_GET['addressre'];} ?></textarea> -->
        <label for="">AREA : </label>
      <textarea name="address" rows="1" cols="43"></textarea><br>
     
      


      <label for="">Gender:</label>
      <input type="radio" name="gender" value="male" >male
      <input type="radio" name="gender" value="female" >Female
      <input type="radio" name="gender" value="other">Other<br>



      Games:
      <input type="checkbox" name="game[]" value="BGMI" >BGMI
      <input type="checkbox" name="game[]" value="PUBG">PUBG
      <input type="checkbox" name="game[]" value="FREE FIRE">FREE FIRE
      <input type="checkbox" name="game[]" value="CALL OF DUTY" >CALL OF DUTY
      <input type="checkbox" name="game[]" value="CLASH OF CLANS">CLASH OF CLANS
      <input type="checkbox" name="game[]" value="MINECRAFT">MINECRAFT<br>
      <br>

      <input type="submit" name="submit" value="submit" class="btn btn-info" >

    </form>

    <h4 class="text-center text-danger">Display records</h4>
    <table class="table table-bordered" >
        <tr class="bg-primary text-center" >
            <th>ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>GENDER</th>
            <th>GAMES</th>
        </tr>
    </table>
</body>
</html>