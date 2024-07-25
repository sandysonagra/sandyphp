<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 4</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .alert {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffc107;
            color: #333;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Submitted Values on Page 4</h1>
        <hr>

        <?php
        $connection = mysqli_connect('localhost', 'username', 'password', 'interview_practise_all_task_database');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['checkbox'])) {
                $checkedValue = implode(',', $_POST['checkbox']);
                $sql = "INSERT INTO `user`(`name`) VALUES ('$checkedValue')";
                $result = mysqli_query($connection, $sql);
            } else {
                echo '<div class="alert" role="alert">
                        No values selected.
                    </div>';
            }
        } else {
            echo "Form not submitted.";
        }
        ?>
        <a href="index.php" class="btn">Back to Page 1</a>

        <h2>Associated Data</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fetchdata = "SELECT * FROM `user`";
                $fetchResult = mysqli_query($connection, $fetchdata);

                while ($row = mysqli_fetch_assoc($fetchResult)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
