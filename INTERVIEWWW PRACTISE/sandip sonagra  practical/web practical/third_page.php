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
        <h1 align="center" style="background-color: lime;" class="heading">select check box</h1>
        <hr class="heading">
        <br>
        <div class="container">
            <form method="POST" action="fourth_page.php">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $numInputs = $_GET['HiddenValue'];
                    $validCount = 0;
                    for ($i = 1; $i <= $numInputs; $i++) {
                        $inputName = 'exampleInputNumber' . $i;
                        $inputValue = $_GET[$inputName] ?? '';
                        if (!empty($inputValue)) {
                            $validCount++;
                            echo '<div class="mb-3">
                            <label for="' . $inputName . '" class="form-label">Value ' . $i . '</label>
                            <input type="text" class="form-control" id="' . $inputName . '" name="' . $inputName . '" value="' . $inputValue . '" disabled>
                            <input type="checkbox" id="checkbox' . $i . '" name="checkbox[]" value="' . $inputValue . '">
                            </div>';
                        }
                    }
                } else {
                    echo "Form not submitted.";
                }
                ?>
                <button type="button" class="btn btn-info" onclick="checkAll()">Check All</button>
                <button type="button"class="btn btn-danger" onclick="clearAll()">Clear All</button>
                <?php
                if ($validCount <= 2) {
                    header('location:second_page.php?exampleInputNumber=' . $numInputs . '');
                } else {
                    echo '<button type="submit" name="Submit" class="btn btn-primary">Submit</button>';
                }
                ?>
            </form>
        </div>

        <script>
            function checkAll() {
                var checkboxes = document.getElementsByName('checkbox[]');  
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = true;
                });
            }

            function clearAll() {
                var checkboxes = document.getElementsByName('checkbox[]');
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });
            }
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>