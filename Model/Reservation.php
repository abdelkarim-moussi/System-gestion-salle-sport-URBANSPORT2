<?php


 class Reservation 
{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function Member_AjouterReservation($idMember,$idActivity,$capacite,$prix)
    {
    $status = "pending";
    $date = date('y-m-d');
    $total = $prix * $capacite;
    $checkRole = $this->conn->prepare("SELECT * from public.user where user.role like 'member' and id_user = :id_user ");
    $checkRole->bindParam(":id_user",$idMember,PDO::PARAM_STR);
    $checkRole->execute();
    if ($checkRole->affected_rows>1) {
        $stmt = $this->conn->prepare("INSERT INTO public.reservations(
            id_activity, date_reservation, status)
          VALUES (:id_user,:id_activity,:date_reservation)");
          $stmt->bindParam("id_user",$idMember,PDO::PARAM_STR);
          $stmt->bindParam("id_activity",$id_activity,PDO::PARAM_INT);
          $stmt->bindParam(":date_reservation",$date_reservation,PDO::PARAM_STR);
          $stmt->execute();
          if ($stmt->affected_rows > 0) {
              $stmt1  = $this->conn->prepare("UPDATE public.activities
          SET  capacity= capacity-1
          WHERE");
              $stmt1->execute();
              
          } else {
              echo "No rows were inserted. Please check your data.";
          }
    }
   
    }
    
    public function Member_showReservations($id)
    {
        $stmt = $this->conn->prepare("
        SELECT *
	FROM public.reservations r inner join public.users u on u.id_user = r.id_user where r.id_user like :id_user");
        $stmt->bindParam(':id_user',$id,PDO::PARAM_STR);
           try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function Admin_showReservations()
    {
        $result = $this->conn->query("
         SELECT reservations_activites.ID_Reservation, reservations_activites.ID_Membre, reservations_activites.Places_Reserver AS Detail,
          activités.description AS description, activités.activite_name AS Nom, reservations_activites.ID_Activité AS Resource,
           'reservations_activites' AS Source 
           FROM `reservations_activites` 
           INNER join activités ON activités.id_activite = reservations_activites.ID_Activité 
        ORDER BY Source;");
        try {
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function Admin_ConfirmReservation($idReservation)
    {
        $status = "ACCEPTER";
        $stmt = $this->conn->prepare("UPDATE public.reservations
        SET  status=:status
        WHERE idreservation = :idreservation");
            $stmt->bindParam(":idreservation",$idReservation,PDO::PARAM_INT);
            $stmt->bindParam(":status",$status,PDO::PARAM_STR);
            
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
    }
    public function Admin_ReffuseReservation($idReservation)
    {
        $status = "REFFUSER";
        $stmt = $this->conn->prepare("UPDATE public.reservations
        SET  status=:status
        WHERE idreservation = :idreservation");
            $stmt->bindParam(":idreservation",$idReservation,PDO::PARAM_INT);
            $stmt->bindParam(":status",$status,PDO::PARAM_STR);
            try {
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
    }
    public function Member_AnnulerReservation($idReservation,$idMember)
    {
    
        $status = "refused";
        $stmt = $this->conn->prepare("UPDATE public.reservations
        SET  status=:status
        WHERE id_reservation = :id_reservation and id_user like :id_user");
            $stmt->bindParam(":status",$status,PDO::PARAM_STR);
            $stmt->bindParam(":id_reservation",$idReservation,PDO::PARAM_INT);
            $stmt->bindParam(":id_user",$idMember,PDO::PARAM_STR);
            try {
                $stmt->execute();
                echo "is executed";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();

            }
    }
    
}
