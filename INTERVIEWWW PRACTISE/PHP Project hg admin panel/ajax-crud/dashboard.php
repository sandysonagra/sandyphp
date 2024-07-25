<?php
$data = '<table class="table table-success table-striped">
                <tr>
                <th><b>#</b></th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>GENDER</th>
                <th>ACTION</th>
                </tr>';

include('connection.php');

$sql = "SELECT * FROM `student_form_ajax`";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $data .= '<tr>
                             <td>' . $row['ID'] . '</td>
                             <td>' . $row['NAME'] . '</td>
                             <td>' . $row['EMAIL'] . '</td>
                             <td>' . $row['PASSWORD'] . '</td>
                             <td>' . $row['GENDER'] . '</td>
                             <td><button class="bg-info Editbtn" onclick="GetUserDetails(' . $row['ID'] . ')"><i class="fa-sharp fa-solid fa-pen-to-square"></i> </button>
                            <button class="bg-warning" id="Deletbtn" onclick="DeleteUser(' . $row['ID'] . ')"><i class="fa-solid fa-trash fa-shake"></i></button></td></tr>';
        }
    } else {
        // echo "alert('No Record Found')";
?>
        <script>
            alert('No Record Found');
        </script>
<?php
    }
}
$data .= '</table>';
echo $data;
