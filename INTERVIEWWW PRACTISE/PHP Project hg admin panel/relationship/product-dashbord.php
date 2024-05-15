<!doctype html>
<html lang="en">

<head>
    <title>Product-Dashbord</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container border border-info border-5">
        <div class="text-center bg-info mt-3">
            <h1><b>Product-Dashbord</b></h1>
        </div>
        <div class="text-end">
            <a href="product-form.php" class="btn btn-secondary mb-2">New Form</a>
        </div>
        <?php
        include("catagory/connection.php");

        echo "<table class='table table-success table-striped'>";
        echo "<thead><tr><td>ID</td><td>IMAGE</td><td>TITLE</td><td>DESCRIPTION</td><td>TAG</td><td>CATAGORY</td><td>Action</td></tr></thead>";

        $sql = "SELECT * FROM `product_form`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>$row[ID]</td>";
            echo "<td><img src='resource/$row[IMAGE]' alt='noppp..' height='100px' width='100px'></td>";
            echo "<td>$row[TITLE]</td>";
            echo "<td>$row[DESCRIPTION]</td>";
            echo "<td>$row[TAG]</td>";
            echo "<td>$row[CATAGORY]</td>";
            echo "<td><a href='product-form.php?id=$row[ID]&title=$row[TITLE]&description=$row[DESCRIPTION]&catagory=$row[CATAGORY]&images=$row[IMAGE]&tag=$row[TAG]' class='btn btn-primary'>Edit</a>&nbsp <a href='delete.php?deleteID=$row[ID]' class='btn btn-danger'>Delete</a></td>";
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