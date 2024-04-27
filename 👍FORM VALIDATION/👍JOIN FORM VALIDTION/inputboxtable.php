<?php

include("joinconnection.php");

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>only one input</title>
</head>

<body>

    <body style="margin: 50px;">
        <h1 align='center'>PRODUCT</h1>

        <a href="join_form_validation.php"></a>

        <table class="table">
            <thead>
                <tr>
                    <th class="tb">ID</th>
                    <th class="tb">PRODUCT NAME</th>


                </tr>
            </thead>
            <tbody>


                <?php

                $sql = "SELECT * FROM `product`";
                $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {





                echo "<tr>
<td>" . $row["ID"] . "</td>
<td>" . $row["PRODUCT"] . "</td>

<td>
           
<button class='btn btn-primary'>
<a href='inputbox.php?updateid=$row[ID]&name=$row[PRODUCT]' class='text-light'>EDIT</a>
</button>
<button class='btn btn-danger'><a href='inputboxdelete.php?deleteid=$row[ID]' class='text-light'>DELETE</a></button>

</td>
</tr>";
}


                ?>

            </tbody>
        </table>
    </body>

</html>