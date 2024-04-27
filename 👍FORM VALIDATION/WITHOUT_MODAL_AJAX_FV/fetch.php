<?php

// database connection
$conn = mysqli_connect("localhost", "root", "", "ajax_crud_without_modal");

// fetch data code
$output = '';
$query = mysqli_query($conn, "SELECT * FROM studentajax");
$output .= '
<div class="table-responsive">
<table class="table">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Hobby</th>
    <th>Date Of Birth</th>
    <th>Country</th>
    <th>Address</th>
</tr>

';

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
    $output .= '
    <tr>
        <td>'.ucfirst($row["id"]).'</td>
        <td>'.ucfirst($row["name"]).'</td>
        <td>'.ucfirst($row["gender"]).'</td>
        <td>'.ucfirst(str_replace(",","/",$row["hobby"])).'</td>
        <td>'.date("d/m/y",strtotime($row["date_of_birth"])).'</td>
        <td>'.$row["country"].'</td>
        <td>'.$row["address"].'</td>
    </tr>
                ';    
    }
}
    else {
        $output.=
        '
        <tr>
            <td>No Data</td>
        </tr>
        ';
    }
    $output .= '
    </table>
</div>
    ';

    echo $output;
