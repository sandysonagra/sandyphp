<?php
session_start();

$email = $_SESSION['email'];

if(!isset($_SESSION['email']))
{
    header('location:login.php');
}
// else
// {
    // header('location:table.php');
// }

include ('connection.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data</title>
</head>

<body>
    <center>
        <h2>All Data</h2>
    </center>
    <table align='center' border="15">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // print_r($_SESSION['email']);
            // exit();
            // $email = $_SESSION['email'];
            $sql = "SELECT * FROM `login_register_kuldip`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr> 
                
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td><a href='logout.php'>LOGOUT</a></td>
                
                </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>