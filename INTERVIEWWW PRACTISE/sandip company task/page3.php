<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $values = $_POST['textbox'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page 3</title>
    </head>
    <body>
        <h2>Display Textboxes</h2>
        <form action="page4.php" method="post">
            <?php
            foreach ($values as $index => $value) {
                if (!empty($value)) {
                    echo "<input type='checkbox' name='checkbox[]' value='$value'>$value<br>";
                }
            }
            ?>
            <br>
            <button type="button" onclick="checkAll()">Check All</button>
            <button type="button" onclick="clearAll()">Clear All</button>
            <button type="submit">Submit</button>
        </form>
        <script>
            function checkAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = true;
                });
            }

            function clearAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            }
        </script>
    </body>
    </html>
    <?php
}
?>
    