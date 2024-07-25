<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container border border-info border-5">
        <div class="text-center bg-info mt-3">
            <h1><b>User Data</b></h1>
        </div>
        <div class="text-end">
            <a href="form.php" class="btn btn-secondary mb-2" >New Form</a>
        </div>
        <?php
        include("connection.php");

        echo "<table class='table table-success table-striped'>";
        echo "<thead><tr><td>ID</td><td>PHOTO</td><td>NAME</td><td>EMAIL</td><td>PASSWORD</td><td>NUMBER</td><td>GENDER</td><td>Action</td></tr></thead>";

        $sql = "SELECT * FROM `student`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>$row[ID]</td>";
            echo "<td><img src='images/$row[PHOTO]' alt='noppp..' height='100px' width='100px'></td>";
            echo "<td>$row[NAME]</td>";
            echo "<td>$row[EMAIL]</td>";
            echo "<td>$row[PASSWORD]</td>";
            echo "<td>$row[NUMBER]</td>";
            echo "<td>$row[GENDER]</td>";
            echo "<td><a href='form.php?id=$row[ID]&name=$row[NAME]&email=$row[EMAIL]&password=$row[PASSWORD]&number=$row[NUMBER]&gender=$row[GENDER]&image=$row[PHOTO]' class='btn btn-primary'>Edit</a>&nbsp <a href='delete.php?deleteID=$row[ID]' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>