<?php
$conn = mysqli_connect("localhost","root","","youtubecrudoperation");

extract($_POST);

if (isset($_POST['readrecord'])) {
    # code...
    $data = '<table class="table  table-bordered table-striped">
    <tr>
    <th>NO</th>
<th>FIRSTNAME</th>
<th>LASTNAME</th>
<th>EMAIL</th>
<th>GENDER</th>
<th>HOBBY</th>
</tr>';

$displayquery = "SELECT * FROM `crudtable`";
$result = mysqli_query($conn, $displayquery);

if (mysqli_num_rows($result) > 0) {
    # code...
    $number = 1;
    while ($row = mysqli_fetch_array($result)) {
        $data .= '<tr>
        <td>'.$number.'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['hobby'].'</td>
        <td>
       <button onclick="GetUserDetails('.$row['id'].')" class="btn sbtn-warning">Edit</button>
       </td>
       <td>
        <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
       </td>
       </tr>';
    }
}

}

if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["hobby"]))
{
    $query = "INSERT INTO `crudtable`(`FIRSTNAME`, `LASTNAME`, `EMAIL`, `GENDER`, `HOBBY`) VALUES ('$firstname','$lastname','$email','$gender','$hobby')";

    mysqli_query($conn, $query);
}

?>