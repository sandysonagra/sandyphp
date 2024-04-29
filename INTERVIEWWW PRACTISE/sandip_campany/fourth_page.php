<?php
// print_r($_POST['checkbox']);
$checkboxarray=$_POST['checkbox'];
$checkboxstring=implode(',',$checkboxarray);

// echo $checkboxstring;

$conn = mysqli_connect("localhost","username","password","interview_practise_all_task_database");

if ($checkboxstring != '') {
    
    $sql="INSERT INTO `sandip_data`(`name`) VALUES ('$checkboxstring')";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     echo "Success to insert";
    // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <table border="10px">
        <thead>
            <th>Id</th>
            <th>Name</th>
        </thead>
         <tbody>
            <?php
            
                $sql="SELECT * FROM `sandip_data`"; 
                $result=mysqli_query($conn,$sql);
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
    </center>
</body>
</html>