    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registered Users</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            .btn {
                padding: 5px 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            .btn a {
                text-decoration: none;
                color: white;
            }

            .btn-danger {
                background-color: #f44336;
                /* Red color */
            }

            .btn-danger:hover {
                background-color: #d32f2f;
                /* Darker red color on hover */
            }
        </style>
    </head>

    <body>

        <?php include ("connection.php"); ?>

        <h2>Registered Users</h2>
        <h4 align="center"><a href="index.php">Add User</a></h4>
        <h3 align="center"><a href="table.php">Reload To See Latest Users</a></h3>
        <table border="5px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Website</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `php_crud_second_error` ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['mobileno'] . "</td>
                <td>" . $row['website'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>
                <button class='btn btn-success'>
                <a href='edit.php?editid=$row[id]'&name='.$row[name].'&email='.$row[email].'&mobileno='.$row[mobileno].'&website='.$row[website].'&gender='.$row[gender].' class='text-light'>EDIT</a>
                </button>
                <button class='btn btn-danger'>
                <a href='delete.php?deleteid=$row[id]' class='text-light'>DELETE</a>
                </button>
                </td>
            </tr>";
                }
                ?>
            </tbody>
        </table>

    </body>

    </html>