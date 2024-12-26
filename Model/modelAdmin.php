<?php
require_once("config/connexion.php");

class modelAdmin{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    public function selectUsers(){
        $stmt = $this->conn->prepare("SELECT * FROM public.users");
        $stmt->execute();
        return $stmt;
    }
    
}

