<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkedValues = $_POST['checkbox'];
    // Connect to your database and insert only the checked values
    // After insertion, fetch the inserted records from the database
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page 4</title>
    </head>
    <body>
        <h2>Checked Values Inserted</h2>
        <?php
        if (!empty($checkedValues)) {
            // Display the checked values
            echo "<ul>";
            foreach ($checkedValues as $value) {
                echo "<li>$value</li>";
                // Insert $value into your database
                // Example: INSERT INTO your_table (column_name) VALUES ('$value');
            }
            echo "</ul>";
            // Fetch the inserted records from the database
            // Example: SELECT * FROM your_table WHERE column_name IN ('$checkedValues');
        } else {
            echo "<p>No values were checked.</p>";
        }
        ?>
    </body>
    </html>
    <?php
}
?>
