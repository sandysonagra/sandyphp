<!doctype html>
<html lang="en">

<head>
    <title>Tag Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="text-center bg-info mt-3">
            <h1><b>Tag Data</b></h1>
        </div>
        <div class="text-end">
            <a href="tag.php" class="btn btn-secondary mb-2">Create Tag</a>
        </div>
        <?php
        include("connection.php");

        echo "<table class='table table-success table-striped'>";
        echo "<thead><tr><td>ID</td><td>Catagory</td><td>Action</td></tr></thead>";

        $sql = "SELECT * FROM `tag`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>$row[ID]</td>";
            echo "<td>$row[NAME]</td>";
            echo "<td><a href='tag.php?id=$row[ID]&tag_name=$row[NAME]' class='btn btn-warning'>Edit</a>&nbsp <a href='tag-delete.php?deleteID=$row[ID]' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>