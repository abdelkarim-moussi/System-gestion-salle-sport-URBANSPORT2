<?php
require_once("config/connexion.php");
class modelMemeber{
    
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function afficherInfos($id){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user = :id_user");
        $stmt->bindParam(":id_user",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function modifierInfos($user_id,$lastname,$firstname,$email){

        $stmt = $this->conn->prepare("UPDATE public.users
	SET firstname=:firstname, lastname=:lastname, email=:email WHERE id_user=:id_user");
        $stmt->bindParam(":firstname",$firstname,PDO::PARAM_STR);
        $stmt->bindParam(":lastname",$lastname,PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->bindParam(":id_user",$user_id,PDO::PARAM_INT);
        $stmt->execute();
    }

}