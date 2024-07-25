<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page 2</title>
        <script>
            function validateForm() {
                var inputs = document.getElementsByName('textbox[]');
                var filledCount = 0;
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value.trim() !== '') {
                        filledCount++;
                    }
                }
                if (filledCount < 3) {
                    alert('Please fill at least three input boxes before submitting.');
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <h2>Create Textboxes</h2>
        <form action="page3.php" method="post" onsubmit="return validateForm()">
            <?php
            for ($i = 1; $i <= $number; $i++) {
                echo "<label for='textbox$i'>Textbox $i:</label>";
                echo "<input type='text' id='textbox$i' name='textbox[]'><br>";
            }
            ?>
            <button type="submit">Submit</button>
        </form>
    </body>

    </html>
    <?php
}
?>