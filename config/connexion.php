<!-- <?php

class Database{

    private $server =  "localhost";
    private $dbname = "systmedb";
    private $username = "postgres";
    private $password = "moussi@25";


    protected function connectDb(){

        try{
          
            $pdo = new PDO("pgsql:host=".$this->server .";dbname=".$this->dbname,$this->username,$this->password);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "connected";
            return $pdo;

        }catch(PDOException $e){

            die("connection failed".$e->getMessage());
        }
    }

    public function getConnectDb(){
        return $this -> connectDb();
    }
}

$cone  = new Database();
$cone -> getConnectDb();



