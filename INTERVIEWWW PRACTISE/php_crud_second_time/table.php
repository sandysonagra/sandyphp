<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>

<body>
    <?php include ('connection.php'); ?>

    <h2>REGISTERED USERS</h2>

    <table border="5px">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Website</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM `php_crud_second_error_second_time` ";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>
                
                <td> ". $row['id'] ." </td>
                <td> ". $row['name'] ." </td>
                <td> ". $row['email'] ." </td>
                <td> ". $row['mobileno'] ." </td>
                <td> ". $row['website'] ." </td>
                <td> ". $row['gender'] ." </td>
                <td>
                
                <button class='btn btn-success'>
                    <a href='edit.php?editid=$row[id]' class='text-light' >EDIT</a>
                </button>
                
                
                </td>
                
                
                </tr>";
            }

            ?>
        </tbody>
    </table>

</body>

</html>