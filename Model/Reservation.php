<?php


 class Reservation 
{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function addReservation($nomeReservation,$capacite,$prix)
    {
    $total = $prix * $capacite;
    $stmt = $this->conn->prepare("INSERT INTO `reservations_activites`( `ID_Membre`, `ID_Activité`,`Prix_Reservation`,`Places_Reserver`) 
    VALUES (?,?,?,?)");
    $stmt->execute([$idClient,$idActivity,$total,$capacite]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $this->conn->prepare("UPDATE `activités` SET `Capacité`= `Capacité`-? WHERE  `id_activite` = ?");
        $stmt1->execute([$capacite,$idActivity]);
        if ($stmt1->affected_rows > 0) {
            $stmt2 = $connexion->prepare("UPDATE `activités` SET Disponibilité = ? where `Capacité` = ?");
            $stmt2->execute([0,0]);
        }
    } else {
        echo "No rows were inserted. Please check your data.";
    }
    }
}
