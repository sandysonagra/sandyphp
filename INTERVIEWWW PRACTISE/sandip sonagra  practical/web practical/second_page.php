<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1 align="center" style="background-color: lime;" class="heading">User Enter Input Boxes</h1>
        <hr class="heading">
        <br>
        <form method="get" action="third_page.php">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['exampleInputNumber'])) {
                    $Number = $_POST['exampleInputNumber'];
                }
            }
            if (isset($_GET['exampleInputNumber'])) {
                $Number = $_GET['exampleInputNumber'];
                if ($validCount < 3) {
                    echo '<div class="alert alert-danger" role="alert">
                                Please input values in at least 3 textboxes.
                            </div>';
                }
            }
            $validCount = 0;
            for ($i = 1; $i <= $Number; $i++) {
                echo '<div class="mb-3">
                            <label for="exampleInputNumber' . $i . '" class="form-label">Enter Number box ' . $i . '</label>
                            <input type="text" class="form-control" id="exampleInputNumber' . $i . '" name="exampleInputNumber' . $i . '" >
                        </div>';
                $validCount = $i;
            }
            ?>
            <input type="hidden" name="HiddenValue" value="<?php if (isset($Number)) {
                                                                echo $Number;
                                                            } ?>">
            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>