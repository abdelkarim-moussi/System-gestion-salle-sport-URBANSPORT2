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



    /** Les methodes magiques */

    // public __get($test){
    //     $this->teqt = $rze
    // }
}
function selectSpecialities(){
    $pdo = Connexion();
    $stmt = $pdo->query("select * from public.specialite");
    return $stmt;
}