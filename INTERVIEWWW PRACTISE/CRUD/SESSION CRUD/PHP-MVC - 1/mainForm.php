<?php
include ('connection.php');

session_start();
if (isset($_GET['editId'])) {
    $editid = isset($_GET['editId']) ? $_GET['editId'] : '';

    $sql = "SELECT * FROM `phpcrud` WHERE id=$editid";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $_SESSION['values'] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="Asset/Css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Your Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <h2>Form</h2>
        <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo isset($_SESSION['values']['name']) ? $_SESSION['values']['name'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : ''; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo isset($_SESSION['values']['email']) ? $_SESSION['values']['email'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : ''; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="<?php echo isset($_SESSION['values']['password']) ? $_SESSION['values']['password'] : ''; ?>">
                <div class="error">
                    <?php
                    echo isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : ''; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['values']['gender']) && $_SESSION['values']['gender'] == 'male' ? 'checked' : ''; ?>>male

                <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['values']['gender']) && $_SESSION['values']['gender'] == 'female' ? 'checked' : ''; ?>>female
                <div class="error">
                    <?php
                    echo isset($_SESSION['errors']['gender']) ? $_SESSION['errors']['gender'] : ''; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="error">
                    <?php
                    echo isset($_SESSION['errors']['image']) ? $_SESSION['errors']['image'] : ''; ?>
                </div>
            </div>
            <?php if (isset($_GET['editId']) || (isset($_GET['updateid']) && $_GET['updateid'] != '')) { ?>
                <button type="submit" class="btn btn-success" name="update">Update</button>
            <?php } else { ?>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <?php } ?>

                <input type="hidden" name="updateId" value="<?php echo isset($_GET['editId']) ? $_GET['editId'] : '';
            if (isset($_GET['updateid'])) {
                echo $_GET['updateid'];
            }
            ?>">

        </form>
    </div>
    <?php
    session_destroy();
    ?>
    <div class="container">
        <table class="table shadow">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>GENDER</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `phpcrud`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td> <img src="images/<?= $row['image'] ?>" class="img-fluid rounded-top" alt="" width="120px"
                                height="120px" />
                        </td>
                        <td class="">
                            <button class="btn btn-warning me-1"><a href="mainForm.php?editId=<?php echo $row['id'] ?>"
                                    class="text-light" style="text-decoration:none;"><i
                                        class="fas fa-edit"></i></a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteId=<?php echo $row['id'] ?>"
                                    class="text-light" style="text-decoration:none;"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>


</body>

</html>