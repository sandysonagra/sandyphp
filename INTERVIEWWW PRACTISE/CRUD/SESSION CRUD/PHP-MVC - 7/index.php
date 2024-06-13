<?php

session_start();

include ('connection.php');

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $sql = "SELECT * FROM `session_crud_by_sandip_seventh_time` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['value']['name'] = $row['name'];
    $_SESSION['value']['contactno'] = $row['contactno'];
    $_SESSION['value']['gender'] = $row['gender'];
    $_SESSION['value']['address'] = $row['address'];
    $_SESSION['value']['area'] = $row['area'];
    $language_arr = explode(',', $row['language']);
    $_SESSION['value']['language'] = $language_arr;
    // print_r($row);
    // $_SESSION['value'] = $row;
    // $_SESSION['editid'] = $id;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Form And Tabe Page</title>
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
    <h2 align="center">Form Page</h2><br>
    <div class="container">
        <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" class="form-control"
                    value="<?php echo isset($_SESSION['value']['name']) ? $_SESSION['value']['name'] : '' ?>">
                <div class="error"><?php echo isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="contactno">Contact No. :</label>
                <input type="number" name="contactno" class="form-control"
                    value="<?php echo isset($_SESSION['value']['contactno']) ? $_SESSION['value']['contactno'] : '' ?>">
                <div class="error">
                    <?php echo isset($_SESSION['error']['contactno']) ? $_SESSION['error']['contactno'] : '' ?>
                </div>
            </div>
            <div class="form-group form-control ">
                <label for="gender">Gender :</label>
                <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == "male" ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == "female" ? 'checked' : '' ?>> Female
                <div class="error"><?php echo isset($_SESSION['error']['gender']) ? $_SESSION['error']['gender'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="photo">Image :</label>
                <input type="file" name="photo" class="form-control">
                <div class="error"><?php echo isset($_SESSION['error']['photo']) ? $_SESSION['error']['photo'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address :</label>
                <textarea name="address"
                    class="form-control"><?php echo isset($_SESSION['value']['address']) ? $_SESSION['value']['address'] : '' ?></textarea>
                <div class="error">
                    <?php echo isset($_SESSION['error']['address']) ? $_SESSION['error']['address'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="area">Area :</label>
                <select name="area" class="form-control">
                    <option value="">Select Your Area</option>
                    <option value="Vadaj" <?php echo isset($_SESSION['value']['area']) && $_SESSION['value']['area'] == "Vadaj" ? 'selected' : '' ?>>Vadaj</option>
                    <option value="Vijaynagar" <?php echo isset($_SESSION['value']['area']) && $_SESSION['value']['area'] == "Vijaynagar" ? 'selected' : '' ?>>Vijaynagar</option>
                    <option value="Usmanpura" <?php echo isset($_SESSION['value']['area']) && $_SESSION['value']['area'] == "Usmanpura" ? 'selected' : '' ?>>Usmanpura</option>
                    <option value="Gandhigram" <?php echo isset($_SESSION['value']['area']) && $_SESSION['value']['area'] == "Gandhigram" ? 'selected' : '' ?>>Gandhigram</option>
                    <option value="Paldi" <?php echo isset($_SESSION['value']['area']) && $_SESSION['value']['area'] == "Paldi" ? 'selected' : '' ?>>Paldi</option>
                </select>
                <div class="error"><?php echo isset($_SESSION['error']['area']) ? $_SESSION['error']['area'] : '' ?>
                </div>
            </div>
            <div class="form-group form-control">
                <label for="language">Language :</label>
                <input type="checkbox" name="language[]" value="gujarati" <?php echo isset($_SESSION['value']['language']) && in_array('gujarati', $_SESSION['value']['language']) ? 'checked' : '' ?>>
                Gujarati
                <input type="checkbox" name="language[]" value="hindi" <?php echo isset($_SESSION['value']['language']) && in_array('hindi', $_SESSION['value']['language']) ? 'checked' : '' ?>> Hindi
                <input type="checkbox" name="language[]" value="english" <?php echo isset($_SESSION['value']['language']) && in_array('english', $_SESSION['value']['language']) ? 'checked' : '' ?>> English
                <input type="checkbox" name="language[]" value="marathi" <?php echo isset($_SESSION['value']['language']) && in_array('marathi', $_SESSION['value']['language']) ? 'checked' : '' ?>> Marathi
                <input type="checkbox" name="language[]" value="urdu" <?php echo isset($_SESSION['value']['language']) && in_array('urdu', $_SESSION['value']['language']) ? 'checked' : '' ?>> Urdu
                <div class="error">
                    <?php echo isset($_SESSION['error']['language']) ? $_SESSION['error']['language'] : '' ?>
                </div>
            </div><br>

            <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-primary">
            <input type="submit" name="update" value="UPDATE" class="form-control btn btn-info">
            <input type="hidden" name="hidden" value="<?php echo isset($_GET['editid']) ? $_GET['editid'] : '';
            echo isset($_GET['updateid']) ? $_GET['updateid'] : '';
            ?>">
        </form>
        <?php
        session_destroy();
        ?>
    </div><br><br><br>

    <h3 align="center">DATA</h3>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CONTACT NO</th>
                    <th>GENDER</th>
                    <th>IMAGE</th>
                    <th>ADDRESS</th>
                    <th>AREA</th>
                    <th>LANGUAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `session_crud_by_sandip_seventh_time`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);
                    $languages = explode(', ', $row['language']);
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['contactno'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><img src="images/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>" height="100px" width="100px"></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['area'] ?></td>
                        <td>
                            <?php foreach ($languages as $language) {
                                echo htmlspecialchars($language);
                            } ?>
                        </td>
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