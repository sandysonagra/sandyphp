<?php

include('connection.php');
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>table</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    /* h1 { */
    /* text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 2px;
  margin-top: 20px;
  color: red;
  filter: drop-shadow(0 0 20px #FF0000) drop-shadow(0 0 60px #FF0000);
  animation: animateText 1s steps(1) infinite;
} */
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
  <h1 align='center'>USER'S INFO</h1>
  <br>
  <div align='center'>
    <button class="btn btn-warning my-5"><a class="text-light" href="loginform.php">LOG OUT</a></button>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th class="tb">ID</th>
        <th class="tb">FIRSTNAME</th>
        <th class="tb">EMAIL</th>
        <th class="tb">PASSWORD</th>
        <th class="tb">ACTION</th>

      </tr>
    </thead>
    <tbody>
      <?php

      $store = "";

      // $userprofile = $_SESSION['email'];
      
      // if ($userprofile == true) {
      // # code...
      // }
      // else
      // {
      // header('location:loginform.php');
      // }
      
      $sql = "SELECT * FROM `sessioninformation`";
      $result = mysqli_query($conn, $sql);



      while ($row = mysqli_fetch_assoc($result)) {

        // $gamesto =  $row['GAME'];
        // $gamesto2 = explode("," , $gamesto);
      
        // foreach ($gamesto2 as $key => $value) {
        //     $store .= '&gamere['.$key.'] ='. $value;
        // }
      
        echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["USERNAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["PASSWORD"] . "</td>
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