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
    
    public function Member_showReservations($id)
    {
        $result = $this->conn->query("
         SELECT reservations_activites.ID_Reservation, reservations_activites.ID_Membre, reservations_activites.Places_Reserver AS Detail,
          activités.description AS description, activités.activite_name AS Nom, reservations_activites.ID_Activité AS Resource,
           'reservations_activites' AS Source 
           FROM `reservations_activites` 
           INNER join activités ON activités.id_activite = reservations_activites.ID_Activité 
           WHERE ID_Membre = $id ORDER BY Source;");
           return $result;
    }
    
    public function Admin_ConfirmReservation($idReservation){
        $status = "ACCEPTER";
        $stmt = $this->conn->prepare("UPDATE public.reservations
        SET  status=:status
        WHERE idreservation = :idreservation");
            $stmt->bindParam(":idreservation",$idReservation,PDO::PARAM_INT);
            $stmt->bindParam(":status",$status,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
    }
    
}
