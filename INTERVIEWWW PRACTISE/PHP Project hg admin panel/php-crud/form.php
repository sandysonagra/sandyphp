<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('..\layout\css.php'); ?>
</head>

<body>
    <?php include('..\layout/navbar.php'); ?>
    <!-- < include('..\layout/sidebar.php');?> -->

    <div class="container">

        <div class="mt-3 border border-3 border-warning ">

            <div class="text-center bg-info mt-3">
                <h1><b>Form</b></h1>
            </div>

            <form class="p-3" action="validation.php" method="post" enctype="multipart/form-data">

                <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
                ?>
                    <div class="container row">
                        <div class="mb-3 p-2 col-10">
                            <label for="photo" class="form-label">Photo :</label>
                            <input type="file" name="photo" class="form-control" onchange="preview(event)">
                            <span class="text-danger"><?php echo isset($_GET['fileERR']) ? $_GET['fileERR'] : ""; ?></span>
                        </div>
                        <div class="col-2">
                            <?PHP
                            if (isset($_GET['image'])) {
                            ?>
                                <img src='<?php echo isset($_GET['image']) ? 'images/' . $_GET['image'] : ''; ?>' height='100px' width='100px'>
                            <?php
                            };
                            ?>
                            <img id="thumb" src="" width="150px" />
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="text-center">
                        <img id="thumb" src="" width="150px" />
                    </div>

                    <div class="mb-3 p-2">
                        <label for="photo" class="form-label">Photo :</label>
                        <input type="file" name="photo" class="form-control" onchange="preview(event)">
                        <span class="text-danger"><?php echo isset($_GET['fileERR']) ? $_GET['fileERR'] : ""; ?></span>
                    </div>
                <?php
                } ?>

                <div class="mb-3 p-2">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""; ?>">
                    <span class="text-danger"><?php echo isset($_GET['nameERR']) ? $_GET['nameERR'] : ""; ?></span>
                </div>
                <div class="mb-3 p-2">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""; ?>">
                    <span class="text-danger"><?php echo isset($_GET['emailERR']) ? $_GET['emailERR'] : ""; ?></span>

                </div>
                <div class="mb-3 p-2">
                    <label for="password" class="form-label">Password :</label>
                    <input type="text" name="password" class="form-control" value="<?php echo isset($_GET['password']) ? $_GET['password'] : ""; ?>">
                    <span class="text-danger"><?php echo isset($_GET['passwordERR']) ? $_GET['passwordERR'] : ""; ?></span>

                </div>
                <div class="mb-3 p-2">
                    <label for="number" class="form-label">Number :</label>
                    <input type="text" name="number" class="form-control" value="<?php echo isset($_GET['number']) ? $_GET['number'] : ""; ?>">
                    <span class="text-danger"><?php echo isset($_GET['numberERR']) ? $_GET['numberERR'] : ""; ?></span>

                </div>
                <label for="gender" class="form-label">Gender :</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="male" <?php echo isset($_GET['gender']) && $_GET['gender'] == "male" ? "checked" : ""; ?>>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="female" <?php echo isset($_GET['gender']) && $_GET['gender'] == "female" ? "checked" : ""; ?>>
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="other" <?php echo isset($_GET['gender']) && $_GET['gender'] == "other" ? "checked" : ""; ?>>
                    <label class="form-check-label">Other</label>
                </div>
                <span class="text-danger"><?php echo isset($_GET['genderERR']) ? $_GET['genderERR'] : ""; ?></span>

                <div class="text-center mt-3">
                    <?php
                    if (isset($_GET['id'])) {
                    ?>
                        <input type="submit" value="UPDATE" name="update" class="btn btn-warning">
                        <input type="hidden" name="updateID" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ""; ?>">
                    <?php
                    } else {
                    ?>
                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-success">
                    <?php
                    } ?>
                </div>

            </form>

        </div>
    </div>

    <?php include('..\layout\footer.php');?>
    <script>
        function preview() {
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <?php include('..\layout/script.php');?>

</body>

</html>