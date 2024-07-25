<?php

include ('connection.php');

?>

<!doctype html>
<html lang="en">

<head>
    <title>TABLE PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <center>
            <h2>ALL DATA</h2>
        </center>
        <button class="form-control"><a href="form.php">ADD MORE</a></button>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>gender</th>
                    <th>photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `session_crud_by_sandip_fifth_time` ";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><img src="images/<?= $row['photo'] ?>" height="100px" width="100px"></td>
                        <td>
                            <button class="btn btn-success"><a href="edit.php?editid=<?= $row['id'] ?>"
                                    class="text-light">EDIT</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=<?= $row['id'] ?>"
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