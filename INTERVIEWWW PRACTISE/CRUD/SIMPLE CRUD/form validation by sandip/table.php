<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DATA</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
</head>

<body>

    <center>
        <h1>STUDENT DATA</h1>
        <a href="form.php">ADD STUDENT</a>
    </center>

    <table class="table" border="10px" align="center">
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

            include('connection.php');

            $sql = "SELECT * FROM `student_form`";
            $result = mysqli_query($conn, $sql);
            // print_r($result);
            // exit();

            while ($row = mysqli_fetch_assoc($result)) {
                // $rowID = $row['id'];
                echo "<tr>

                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td> <img src='images/".$row['photo']."' height=50px width=100px> </td>
                <td>
                <button><a href='edit.php?editid=$row[id]'>EDIT</a></button>  
                <button><a href='delete.php?deleteid=$row[id]'>DELETE</a></button>  
                </td>
                </tr>";
            }
            
            ?>
        </tbody>
    </table>

    <?php

    include ('connection.php');

    $sql = "SELECT * FROM `student_form`";

    $result = mysqli_query($conn, $sql);

    ?>



    <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
</body>

</html>