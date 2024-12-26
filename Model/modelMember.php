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
    
    public function modifierInfos($id){
        $stmt = $this->conn->prepare("UPDATE public.users
        SET firstname=:firstname, lastname=:lastname, email=:email
        WHERE  id = :id");
        $stmt->bindParam(":firstname",$firstname,PDO::PARAM_STR);
        $stmt->bindParam(":lastname",$lastname,PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }

}