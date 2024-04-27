<?php
class Database{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'username', 'password', 'sandy_php_projects');
        if (mysqli_connect_error()) {
            echo "Error: " . mysqli_connect_error();
        } else {
            // echo "Connected to the database successfully";
        } 
    }
  
}
$abc = new Database();
?>