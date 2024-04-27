<?php
include('connection.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
     h1 {
  text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 2px;
  margin-top: 20px;
  color: red;
  filter: drop-shadow(0 0 20px #FF0000) drop-shadow(0 0 60px #FF0000);
  animation: animateText 1s steps(1) infinite;
}
@keyframes animateText {
  0%,
  100% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}
.tb {
  text-transform: uppercase;
  font-size: 1em;
  letter-spacing: 2px;
  margin-top: 2px;
  color: red;
  filter: drop-shadow(0 0 1px #000000) drop-shadow(0 0 1px #000000);
  /* animation: animateText 0.3s steps(1) infinite; */
}
@keyframes animateText {
  0%,
  100% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}
    </style>
</head>

<body style="margin: 50px;">
    <h1 align='center'>student information</h1>
    <br>
    <div align='center'>
        <button class="btn btn-warning my-5"><a class="text-light" href="form_validation.php">ADD STUDENT</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="tb">ID</th>
                <th class="tb">FIRST NAME</th>
                <th class="tb">LAST NAME</th>
                <th class="tb">EMAIL</th>
                <th class="tb">ADDRESS</th>
                <th class="tb">SIGN</th>
                <th class="tb">GENDER</th>
                <th class="tb">HOBBY</th>
                <th class="tb">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $store = "";
            // $name=$lname=$mail=$addres1=$gender1 ="";
            $sql = "SELECT * FROM `information`";
            $result = mysqli_query($conn, $sql);

            

            while ($row = mysqli_fetch_assoc($result)) {
                $gamesto =  $row['GAME'];
                $gamesto2 = explode("," , $gamesto);

                foreach ($gamesto2 as $key => $value) {
                    $store .= '&gamere['.$key.'] ='. $value;
                }
                // $name = $row['name'];
                // $lname = $row['lname'];
                // $mail = $row1['email'];
                // $addres1 = $row['address'];
                // $gender1 = $row['gender'];
                 // $game1 =explode($row['game']) ;
            
                echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["FIRSTNAME"] . "</td>
        <td>" . $row["LASTNAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["ADDRESS"] . "</td>
        <td> <img src='".$row['SIGN']."' height='50px' width='100px' ></td>
        <td>" . $row["GENDER"] . "</td>
        <td>" . $row["GAME"] . "</td>
        <td>
           
        <button class='btn btn-success'>
        <a href='edit.php?editid=$row[ID]' class='text-light'>EDIT</a>
        </button>
        <button class='btn btn-danger'>
        <a href='delete.php?deleteid=$row[ID]' class='text-light'>DELETE</a>
        </button>

        </td>
    </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>

<!--   
<button class='btn btn-primary'>
        <a href='form_validation.php?updateid=$row[ID]&name=$row[FIRSTNAME]&lname=$row[LASTNAME]&emailre=$row[EMAIL]&addressre=$row[ADDRESS]&genderre=$row[GENDER]&gamere=$store' class='text-light'>EDIT</a>
        </button> -->