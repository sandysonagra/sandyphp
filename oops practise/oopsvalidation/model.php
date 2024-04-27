<?php


class model
{
    private $servername = 'localhost';
    private $username = 'username';
    private $password = "password";
    private $dbname = "sandy_php_projects";
    private $conn;

    function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            echo "connection failed";
            # code...
        }
        else {
            return $this->conn;
        }
    }
}

?>