<?php

include('oopconnection.php');

class delete extends Database
{

    public $conn;

    public function delete1()
    {




        if (isset($_GET['deleteid'])) {
            # code...
            $id = $_GET['deleteid'];

            // $sql = "delete from `information` where id=$id";
            $sql = "DELETE FROM `oopsinformation` WHERE `oopsinformation`.`ID` = $id";

            $result = mysqli_query($this->conn, $sql);

            if ($result) {
                header('location: oopstable.php');
            } else {
                die(mysqli_error($this->conn));
            }
        }
    }
}

$del = new delete();
$del->delete1();
