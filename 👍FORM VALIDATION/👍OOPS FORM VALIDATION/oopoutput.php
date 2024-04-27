<?php
    include('oopconnection.php');
    class Student extends Database
    {
        // private $conn;
        public $first;
        public $last;
        public $email;
        public $address;
        public $gender;
        public $game;
        public $Error;
        public $value;
        public $gamevalue;
        public $game1;
        public $main;
        public $chackbox;
        
        // public $jay;
        
        // public $sql;
        // public $conn; 
        public function output()
        {
            $jay =$_POST['update']; 
            // echo $jay;
            // exit;
            

            $this->main = "oopsform_validation.php?&no=$jay";
            $this->value = "";
            $this->Error = "";

            // $this->first = $_POST['name'];
            // $this->last =  $_POST['lname'];
            // $this->email =  $_POST['email'];
            // $this->address =  $_POST['address'];
            // $this->gender =  $_POST['gender'];
            // $this->game =  $_POST['game'];
            $this->first = isset($_POST['name']) ? $_POST['name'] : '';
            $this->last = isset($_POST['lname']) ? $_POST['lname'] : '';
            $this->email = isset($_POST['email']) ? $_POST['email'] : '';
            $this->address = isset($_POST['address']) ? $_POST['address'] : '';
            $this->gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $this->game = isset($_POST['game']) ? $_POST['game'] : '';

            if ($this->first == "") {
                $this->Error .= "&fname=*** Please enter your firstname ***";
            } else {
                $this->value .= '&name=' . $this->first . '';
            }

            if ($this->last == "") {
                $this->Error .= "&lastname=*** Please enter your lastname ***";
            } else {
                $this->value .= '&lname=' . $this->last . '';
            }

            if ($this->email == "") {
                $this->Error .= "&email=*** Please enter your email ***";
            } else {
                $this->value .= '&emailre=' . $this->email . '';
            }

            if ($this->address == "") {
                $this->Error .= "&address=*** Please enter your address";
            } else {
                $this->value .= '&addressre=' . $this->address . '';
            }

            if ($this->gender == "") {
                $this->Error .= "&gender=*** Please select your gender";
            } else {
                $this->value .= '&genderre=' . $this->gender . '';
            }

            if ($this->game == "") {
                $this->Error .= "&game=*** Please select your favorite game";
            } else {
                $this->game1 = "";
                $abc = $_POST['game'];
                $this->chackbox = "";
                foreach ($abc as $value) {
                    $this->chackbox .= $value . ",";
                }


                foreach ($this->game as $key => $value1) {
                    $this->value .= '&gamere[' . $key . ']=' . $value1;
                }

                $count = count($this->game);
                if ($count < 2) {
                    $this->Error .= "&game=*** Please select at least 2 games";
                } elseif ($count > 4) {
                    $this->Error .= "&game=*** Please select a maximum of 4 games";
                } else {
                    $this->Error .= "";
                }
            }

            if ($this->Error != "") {
                header('location:' . $this->main . $this->value .  "&" . $this->Error);
            }





            // if ($this->first && $this->last && $this->email && $this->address && $this->gender && $this->game &&$count < 2 && $count > 4) {
            if ($this->Error == "") {

                if (isset($_POST['submit'])) {
                    $sql =  "INSERT INTO `oopsinformation`(`FIRSTNAME`, `LASTNAME`, `EMAIL`, `ADDRESS`,`GENDER`,`GAME`) VALUES ('$this->first','$this->last','$this->email','$this->address','$this->gender','$this->chackbox')";
                    $result = mysqli_query($this->conn, $sql);
                    if ($result) {
                        header('location:oopstable.php');
                    }
                }


                    if (isset($_POST['update_data'])) {


            $sql = "UPDATE `oopsinformation` SET `FIRSTNAME`='$this->first',`LASTNAME`='$this->last',`EMAIL`='$this->email',`ADDRESS`='$this->address', `GENDER`='$this->gender',`GAME`='$this->chackbox' WHERE `ID`='$jay'";
                        $result = mysqli_query($this->conn, $sql);

                        if ($result) {
                            header('location:oopstable.php');
                        }
                    }
            }
        }
    }

    $student1 = new Student();
    $student1->output();
    ?>