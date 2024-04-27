    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DATA</title>
</head>

<body>
    <center>
        <h1>STUDENT DATA</h1>
        <a href="form.php">CLICK HERE TO ADD STUDENT</a>
    </center><br>
    <table border="5" align="center">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>gender</th>
                <th>photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include ('connection.php');

            $sql = "SELECT * FROM `student_form_third_time` ";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td><img src='images/" . $row['photo'] . "' height='50px' width='100'></td>
                <td>
                
                <button><a href='edit.php?editid=$row[id]'>EDIT</a></button>
                <button><a href='delete.php?deleteid=$row[id]'>DELETE</a></button>
                
                
                </td>
                
                </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>