<?php
require_once("config/connexion.php");

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
function selectSpecialities(){
    $db = new Database();
    $pdo = $db->getConnection();
    $stmt = $pdo->query("select * from public.users");
    return $stmt;
}