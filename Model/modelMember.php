<?php
require_once("connexion.php");
class modelMemeber{
    
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function afficherInfos($id){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

}