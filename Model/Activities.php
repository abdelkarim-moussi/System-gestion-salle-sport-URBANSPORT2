<?php


 class Activite 
{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function Admin_showActivities()
    {
        $result = $this->conn->query("
         SELECT *
	    FROM public.activities");
        try {
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function Admin_SupprimerActivite($idActivite)
    {
        $id = $idActivite;
        
        $stmt = $this->conn->prepare("DELETE from public.activities
        WHERE id_activity = :id_activity");
            $stmt->bindParam(":id_activity",$id);
            $stmt->execute();

            try {
                $stmt->execute();
                echo "is deleted";

                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
    }
    public function CountActivities()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as TotalActivities from public.activities");
            try {
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
    }
    public function AddActivite($name_activity,$description,$start_date,$end_date,$capacity)
    {
        echo "is connected";
        $stmt = $this->conn->prepare("INSERT INTO public.activities(
	 name_activity, description, start_date, end_date, capacity)
	VALUES (:name_activity,:description, :start_date, :end_date, :capacity)");
            $stmt->bindParam(":name_activity",$name_activity,PDO::PARAM_STR);
            $stmt->bindParam(":description",$description,PDO::PARAM_STR);
            $stmt->bindParam(":start_date",$start_date,PDO::PARAM_STR);
            $stmt->bindParam(":end_date",$end_date,PDO::PARAM_STR);
            $stmt->bindParam(":capacity",$capacity,PDO::PARAM_INT);
            try {
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
    }
}