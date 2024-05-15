<!doctype html>
<html lang="en">

<head>
    <title>Product Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-3">
        <div class="text-center">
            <h1>Product Form</h1>
        </div>
        <form action="productformvalidation.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3 ">
                <label for="images" class="form-label">image :</label>
                <input type="file" name="images" class="form-control" onchange="preview(event)">
                <span class="text-danger"><?php echo isset($_GET['imagesERR']) ? $_GET['imagesERR'] : ""; ?></span>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title :</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ""; ?>">
                <span class="text-danger"><?php echo isset($_GET['titleERR']) ? $_GET['titleERR'] : ""; ?></span>
            </div>
            <div class="mb-3">
                <label for="description">Description :</label>
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description"><?php echo isset($_GET['description']) ? $_GET['description'] : ""; ?></textarea>
                <span class="text-danger"><?php echo isset($_GET['descriptionERR']) ? $_GET['descriptionERR'] : ""; ?></span>
            </div>
            <div class="mb-3">
                <label for="tag" class="form-label">Tag :</label>
                <select name="tag" class="form-select">
                    <option value="">Slect an Option</option>
                    <?php
            
                    include('catagory/connection.php');
            
                    $sql = "SELECT * FROM `tag`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $tag = $row['NAME'];
                        echo "<option value='$tag'" . ($_GET['tag'] == $tag ? ' selected' : '') . ">$tag</option>";
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo isset($_GET['tagERR']) ? $_GET['tagERR'] : ""; ?></span>
            </div>
            <div class="mb-3">
                <label for="catagory" class="form-label">Catagory :</label>
                <select name="catagory" class="form-select">
                    <option value="">Slect an Option</option>
                    <?php

                    include('catagory/connection.php');

                    $sql = "SELECT * FROM `catagory`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $catagory = $row['NAME'];
                        echo "<option value='$catagory'" . ($_GET['catagory'] == $catagory ? ' selected' : '') . ">$catagory</option>";
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo isset($_GET['catagoryERR']) ? $_GET['catagoryERR'] : ""; ?></span>
            </div>
            <div class="mb-3 mt-5 text-center">
                <?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    echo "<input type='submit' class='btn btn-warning' name='update' value='Update'>";
                } else {
                    echo "<input type='submit' class='btn btn-success' name='submit' value='Submit'>";
                }
                ?>
                <input type="hidden" name="updateid" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ""; ?>">
            </div>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>