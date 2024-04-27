<?php

session_start();
include ('connection.php');

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $sql = "SELECT * FROM `session_crud_by_sandip` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $_SESSION['value'] = $row;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>CRUD USING SESSION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Custom styles */
        body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <center>
            <h2>FORM</h2>
        </center>
        <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">NAME : </label>
                <input type="text" name="name" class="form-control" id="name"
                    value="<?php echo isset($_SESSION['value']['name']) ? $_SESSION['value']['name'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">EMAIL : </label>
                <input type="email" name="email" id="email" class="form-control"
                    value="<?php echo isset($_SESSION['value']['email']) ? $_SESSION['value']['email'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">PASSWORD :</label>
                <input type="text" name="password" id="password" class="form-control"
                    value="<?php echo isset($_SESSION['value']['password']) ? $_SESSION['value']['password'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : '';
                    ?>
                </div>
            </div>
            <div class="form-group form-control">
                <label for="gender">GENDER :</label>
                <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'male' ? 'checked' : ''; ?>>Male
                <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'female' ? 'checked' : ''; ?>>Female
                <input type="radio" name="gender" value="other" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'other' ? 'checked' : ''; ?>>Other
                <div class="error">
                    <?php
                    echo isset($_SESSION['error']['gender']) ? $_SESSION['error']['gender'] : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="photo">PHOTO :</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <?php 
             if(isset($_GET['editid']) || $_GET['updateid'] != "" )
             {
                 
                echo'<button type="submit" class="btn btn-warning" name="update">UPDATE</button>';
             }
             else{
                echo '<button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>';
             }
            ?>
            
            <input type="hidden" name="hidden" value="<?php echo isset($_GET['editid']) ? $_GET['editid'] : '';
            if (isset($_GET['updateid'])) {
                echo $_GET['updateid'];
            } ?>">
        </form>
    </div><br><br>

    <?php
    session_destroy();
    ?>

    <div class="container">
        <table class="table shadow ">
            <thead class="thead-dark">
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>email</td>
                    <td>password</td>
                    <td>gender</td>
                    <td>photo</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `session_crud_by_sandip`";
                $result = mysqli_query($conn, $sql);
                // print_r($result);
                // exit();
                
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><img src="images/<?= $row['photo'] ?>" height="100px" width="100px"></td>
                        <td>
                            <button class="btn btn-success me-1"><a href="form.php?editid=<?php echo $row['id'] ?>"
                                    class="text-light">EDIT</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $row['id'] ?>"
                                    class="text-light">DELETE</a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>