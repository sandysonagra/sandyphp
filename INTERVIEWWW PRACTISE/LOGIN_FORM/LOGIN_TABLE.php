<?php
include('config.php');
session_start();
$userprofile = $_SESSION['email'];
if ($userprofile == true) {

    # code...
} else {
    header('location:login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        h1 {
            / text-transform: uppercase;
            font-size: 2em;
            letter-spacing: 2px;
            margin-top: 20px;
            color: black;

        }
    </style>
</head>

<body>
    <h1 align='center'>USER'S INFO</h1>
    <br>
    <div align='center'>
        <button class="btn btn-warning "><a class="text-light" href="LOGIN.php">LOG OUT</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="tb">ID</th>
                <th class="tb">FIRSTNAME</th>
                <th class="tb">PASSWORD</th>
                <th class="tb">EMAIL</th>
                <th class="tb">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $store = "";
            $username = $_SESSION['email'];
            $password = $_SESSION['password'];



            $sql = "SELECT * FROM `login_register_session_table` WHERE EMAIL ='$username'&& PASSWORD ='$password' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["FNAME"] . "</td>
        <td>" . $row["PASSWORD"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>
           
        <button class='btn btn-success'>
        <a href='LOGIN_EDIT.php?editid=$row[ID]' class='text-light'>EDIT</a>
        </button>
        <button class='btn btn-danger'>
        <a href='LOGIN_DELET.php?deleteid=$row[ID]' class='text-light'>DELETE</a>
        </button>

        </td>
    </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>