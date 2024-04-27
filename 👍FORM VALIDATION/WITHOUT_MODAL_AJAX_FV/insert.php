<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "sandy_php_projects");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ensure you properly sanitize user inputs before using them in your query
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $hobby = implode(",", $_POST['hobby']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "INSERT INTO studentajax (name, gender, hobby, date_of_birth, country, address) VALUES ('$name', '$gender', '$hobby', '$date_of_birth', '$country', '$address')";

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success">
            <b class="text-success">Successfully Data Inserted</b>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!-- 
// database conection
$conn = mysqli_connect("localhost","root","","ajax_crud_without_modal");


extract($_POST);

if(isset($_POST)){
    $query = mysqli_query($conn,"INSERT INTO `studentajax`(`name`, `gender`, `hobby`, `date_of_birth`, `country`, `address`) VALUES ('$name','$gender','.implode(",",$hobby)','$date_of_birth','$country','$address')");
}

if($query == true){
    echo'<div class="alert alert-success">
    <b class="text-success">Successfully Data Inserted</>
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times</span>
    </button>
    ';
}

?> -->