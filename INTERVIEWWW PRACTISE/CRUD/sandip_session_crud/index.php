<?php

session_start();
include ("conn.php");

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $sql = "SELECT * FROM `crud_operation` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['value'] = $row;
        $language_exp = explode(',', $row['language']);
        $_SESSION['value']['language'] = $language_exp;
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Session Crud </title>
    <style>
        .error {
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body><br><br>
    <h2 align="center">FORM</h2>
    <div class="container">
        <form action="validation.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" class="form-control"
                    value="<?php echo isset($_SESSION['value']['name']) ? $_SESSION['value']['name'] : '' ?>">
                <div class="error"><?php echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control"
                    value="<?php echo isset($_SESSION['value']['email']) ? $_SESSION['value']['email'] : '' ?>">
                <div class="error"><?php echo isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" name="password" class="form-control"
                    value="<?php echo isset($_SESSION['value']['password']) ? $_SESSION['value']['password'] : '' ?>">
                <div class="error">
                    <?php echo isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address"
                    class="form-control"><?php echo isset($_SESSION['value']['address']) ? $_SESSION['value']['address'] : '' ?></textarea>
                <div class="error">
                    <?php echo isset($_SESSION['error']['address']) ? $_SESSION['error']['address'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group form-control">
                <label for="gender">Gender :</label>
                <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'female' ? 'checked' : '' ?>> Female
                <input type="radio" name="gender" value="Other" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == 'Other' ? 'checked' : '' ?>> other
                <div class="error"><?php echo isset($_SESSION['error']['gender']) ? $_SESSION['error']['gender'] : '' ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="city">City :</label>
                <select name="city" class="form-control">
                    <option value="">Please Select Your City </option>
                    <option value="morbi" <?php echo isset($_SESSION['value']['city']) && $_SESSION['value']['city'] == 'morbi' ? 'selected' : '' ?>>Morbi</option>
                    <option value="ahmedabad" <?php echo isset($_SESSION['value']['city']) && $_SESSION['value']['city'] == 'ahmedabad' ? 'selected' : '' ?>>Ahmedabad</option>
                    <option value="vadodara" <?php echo isset($_SESSION['value']['city']) && $_SESSION['value']['city'] == 'vadodara' ? 'selected' : '' ?>>Vadodara</option>
                    <option value="surat" <?php echo isset($_SESSION['value']['city']) && $_SESSION['value']['city'] == 'surat' ? 'selected' : '' ?>>Surat</option>
                    <option value="rajkot" <?php echo isset($_SESSION['value']['city']) && $_SESSION['value']['city'] == 'rajkot' ? 'selected' : '' ?>>Rajkot</option>
                </select>
                <div class="error"><?php echo isset($_SESSION['error']['city']) ? $_SESSION['error']['city'] : '' ?>
                </div>

            </div>

            <div class="form-group form-control">
                <label for="language">Language</label>
                <input type="checkbox" name="language[]" value="gujarati" <?php echo isset($_SESSION['value']['language']) && in_array('gujarati', $_SESSION['value']['language']) ? 'checked' : '' ?>> Gujarati
                <input type="checkbox" name="language[]" value="hindi" <?php echo isset($_SESSION['value']['language']) && in_array('hindi', $_SESSION['value']['language']) ? 'checked' : '' ?>> Hindi
                <input type="checkbox" name="language[]" value="english" <?php echo isset($_SESSION['value']['language']) && in_array('english', $_SESSION['value']['language']) ? 'checked' : '' ?>> English
                <input type="checkbox" name="language[]" value="urdu" <?php echo isset($_SESSION['value']['language']) && in_array('urdu', $_SESSION['value']['language']) ? 'checked' : '' ?>> Urdu
                <input type="checkbox" name="language[]" value="marathi" <?php echo isset($_SESSION['value']['language']) && in_array('marathi', $_SESSION['value']['language']) ? 'checked' : '' ?>> Marathi
                <input type="checkbox" name="language[]" value="telugu" <?php echo isset($_SESSION['value']['language']) && in_array('telugu', $_SESSION['value']['language']) ? 'checked' : '' ?>> Telugu
                <div class="error">
                    <?php echo isset($_SESSION['error']['language']) ? $_SESSION['error']['language'] : '' ?>
                </div>
            </div><br><br>
           
            <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success">
            <input type="submit" name="update" value="UPDATE" class="form-control btn btn-primary">
            <input type="hidden" name="hidden" value="<?php echo isset($_GET['editid']) ? $_GET['editid'] : '';
            echo isset($_GET['updateid']) ? $_GET['updateid'] : '' ?>">

        </form>
        <?php

        session_destroy();

        ?>
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

</html><br><br><br>

<h3 align="center">TABLE</h3>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>PHOTO</th>
                <th>GENDER</th>
                <th>CITY</th>
                <th>LANGUAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM `crud_operation` ";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                // $languages = explode(', ', $row['language'])
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><img src="images/<?= $row['photo'] ?>" width="120px" height="120px"></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['language'] ?></td>
                    <td>
                        <button class="btn btn-success"><a href="index.php?editid=<?= $row['id'] ?>"
                                class="text-light">EDIT</a></button>
                        <button class="btn btn-danger"><a href="validation.php?deleteid=<?= $row['id'] ?>"
                                class="text-light">DELETE</a></button>
                    </td>
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</div>