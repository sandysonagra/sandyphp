<?php
include('joinconnection.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        h1 {
            text-transform: uppercase;
            font-size: 2em;
            letter-spacing: 2px;
            margin-top: 20px;
            color: red;
            filter: drop-shadow(0 0 20px #FF0000) drop-shadow(0 0 60px #FF0000);
            animation: animateText 1s steps(1) infinite;
        }

        .tb {
            text-transform: uppercase;
            font-size: 1em;
            letter-spacing: 2px;
            margin-top: 2px;
            color: red;
            filter: drop-shadow(0 0 1px #000000) drop-shadow(0 0 1px #000000);
        }

        @keyframes animateText {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }
    </style>
</head>

<body style="margin: 50px;">
    <h1 align='center'>Join Information</h1>
    <br>
    <div align='center'>
        <button class="btn btn-warning my-5"><a class="text-light" href="join_form_validation.php">ADD
                STUDENT</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="tb">ID</th>
                <th class="tb">FIRST NAME</th>
                <th class="tb">LAST NAME</th>
                <th class="tb">EMAIL</th>
                <th class="tb">ADDRESS</th>
                <th class="tb">SIGN</th>
                <th class="tb">PRODUCT</th>
                <th class="tb">GENDER</th>
                <th class="tb">GAME</th>
                <th class="tb">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $store = "";

            $sql = "SELECT joinusingform.ID, joinusingform.FIRSTNAME, joinusingform.LASTNAME, joinusingform.EMAIL, joinusingform.ADDRESS, joinusingform.SIGN, product.PRODUCT, joinusingform.GENDER, joinusingform.GAME 
            FROM joinusingform
            INNER JOIN product ON joinusingform.IDPRODUCT = product.ID";
            // $sql = 'SELECT * FROM `joinusingform`';
            $result = mysqli_query($conn, $sql);

    
    $result = mysqli_query($conn, $sql);
            // echo $result;
            // exit();
            
            while ($row = mysqli_fetch_assoc($result)) {
                // print_r($row);
                $gamesto = $row['GAME'];
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
                    <td> <img src='" . $row['SIGN'] . "' height='50px' width='100px' ></td>
                    <td>" . $row["PRODUCT"] . "</td>
                    <td>" . $row["GENDER"] . "</td>
                    <td>" . $row["GAME"] . "</td>
                    <td>
                        <button class='btn btn-primary'>
                            <a href='join_form_validation.php?updateid=$row[ID]&name=$row[FIRSTNAME]&lname=$row[LASTNAME]&emailre=$row[EMAIL]&addressre=$row[ADDRESS]&productre=$row[PRODUCT]&genderre=$row[GENDER]&gamere=$store' class='text-light'>EDIT</a>
                        </button>
                        <button class='btn btn-danger'><a href='joindelete.php?deleteid=$row[ID]' class='text-light'>DELETE</a></button>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>