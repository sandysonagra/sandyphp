<?php

$checkboxarray = $_POST['checkbox'];
$checkboxstring = implode(',',$checkboxarray);

$conn = mysqli_connect("localhost","username","password","interview_practise_all_task_database");

// if($conn)
// {
    // echo "hiii";
// }

if($checkboxstring != "")
{
    $sql = "INSERT INTO `sandip_data_2`(`name`) VALUES ('$checkboxstring')";
    $result = mysqli_query($conn,$sql);
}
// else
// {
    // header('location:third_page.php');
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>PAGE 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <table class="table" >
            <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `sandip_data_2`";
                $result = mysqli_query($conn,$sql);
                $no =0;
                while ($row=mysqli_fetch_array($result)){
                $no=$no+1;
                    echo "<tr>
                    <td>$no </td>
                    <td>".$row['name']."</td>
                    </tr>";

                }
                ?>
            </tbody>
        </table>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>