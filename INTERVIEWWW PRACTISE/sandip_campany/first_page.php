<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="second_page.php">
        <label for="number">Enter Number:</label>
        <input type="number" name="number" pattern="[3-9]+" title="Please enter numbers only" ></br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>