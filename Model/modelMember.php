<?php
require_once("connexion.php");
class modelAdmin{
    private int $id;
    private String $name;
    private String $email;

    public function __construct($id,$name,$email){
        $this->$id = $id;
        $this->$name = $name;
        $this->$email = $email;

    }



}