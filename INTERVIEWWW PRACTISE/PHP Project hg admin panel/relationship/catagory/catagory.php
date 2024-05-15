<!doctype html>
<html lang="en">

<head>
    <title>Catagory Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <div class="text-center">

        </div>
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body ">
                    <div class="text-center">
                        <h3><b>Catagory</b></h3>
                    </div>
                    <form action="catagory-validation.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Catagory Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_GET['catagory_name']) ? $_GET['catagory_name'] : ""; ?>">
                            <span class="text-danger"><?php echo isset($_GET['catagory_nameERR']) ? $_GET['catagory_nameERR'] : ""; ?></span>
                        </div>
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            echo "<button type='submit' name ='update' class='btn btn-warning'>Update</button>";
                        } else {
                            echo "<button type='submit' name ='submit' class='btn btn-primary'>Submit</button>";
                        }
                        ?>
                        <input type="hidden" name="updateID" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ""; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>