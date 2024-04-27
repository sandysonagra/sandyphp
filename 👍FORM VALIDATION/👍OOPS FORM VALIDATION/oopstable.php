<?php
include('oopconnection.php');

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oops table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>

    </style>
</head>

<body style="margin: 50px;">
    <h1 align='center'>STUDENT INFORMATION</h1>
    <br>
    <div align='center'>
        <button class="btn btn-warning my-5"><a class="text-light" href="oopsform_validation.php">ADD STUDENT</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="tb">ID</th>
                <th class="tb">FIRST NAME</th>
                <th class="tb">LAST NAME</th>
                <th class="tb">EMAIL</th>
                <th class="tb">ADDRESS</th>
                <th class="tb">GENDER</th>
                <th class="tb">GAME</th>
                <th class="tb">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php

            class table extends Database
            {
                public $conn;

                public function table1()
                {


                    $store = "";
                    $sql = "SELECT * FROM `oopsinformation`";
                    $result = mysqli_query($this->conn, $sql);



                    while ($row = mysqli_fetch_assoc($result)) {
                        $gamesto =  $row['GAME'];
                        $gamesto2 = explode(",", $gamesto);

                        foreach ($gamesto2 as $key => $value) {
                            $store .= '&gamere[' . $key . '] =' . $value;
                        }

                        echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["FIRSTNAME"] . "</td>
        <td>" . $row["LASTNAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["ADDRESS"] . "</td>
        <td>" . $row["GENDER"] . "</td>
        <td>" . $row["GAME"] . "</td>
        <td>
           
        <button class='btn btn-primary'>
        <a href='oopsform_validation.php?updateid=$row[ID]&name=$row[FIRSTNAME]&lname=$row[LASTNAME]&emailre=$row[EMAIL]&addressre=$row[ADDRESS]&genderre=$row[GENDER]&gamere=$store' class='text-light'>EDIT</a>
        </button>
        <button class='btn btn-danger'><a href='oopsdelete.php?deleteid=$row[ID]' class='text-light'>DELETE</a></button>

        </td>
    </tr>";
                    }
                }
            }
            $xyz = new table();
            $xyz->table1(); 


            ?>
        </tbody>
    </table>
</body>

</html>