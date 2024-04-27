<?php


class Player
{
    public $name;
    public $speed;


    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }
}

echo "let understand oops constant using gta voce city";
 $player1 = new Player();
  $player1->set_name("sandip");
  echo $player1->get_name();
 
?>