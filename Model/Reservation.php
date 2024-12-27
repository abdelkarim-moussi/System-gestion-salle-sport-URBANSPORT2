<?php


 class Reservation 
{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function Member_AjouterReservation($idMember,$idActivity,$capacite)
    {
        $id = $idMember;
        $idAct = $idActivity;
        $cap = $capacite;
        echo "hello";
    $status = "pending";
    $date = date('y-m-d');
   echo $date;
        $stmt = $this->conn->prepare("INSERT INTO public.reservations(
           id_user, id_activity, date_reservation)
          VALUES (:id_user,:id_activity,:date_reservation)");
          $stmt->bindParam("id_user",$id,PDO::PARAM_STR);
          $stmt->bindParam("id_activity",$idAct,PDO::PARAM_INT);
          $stmt->bindParam(":date_reservation",$date,PDO::PARAM_STR);
          $stmt->execute();
              $stmt1  = $this->conn->prepare("UPDATE public.activities
          SET  capacity= capacity-:capacity
          WHERE id_activity = :id_activity");
        $stmt1->bindParam(":capacity",$cap,PDO::PARAM_INT);

        $stmt1->bindParam(":id_activity",$idAct,PDO::PARAM_INT);

              $stmt1->execute();
              
          
    
   
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
         SELECT * FROM public.reservations ");
        try {
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function CountReservation()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as TotalReservation from public.reservations");
            try {
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
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
