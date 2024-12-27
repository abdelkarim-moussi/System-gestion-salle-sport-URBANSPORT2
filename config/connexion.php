<?php
class Database{ 
    private $dsn = "pgsql:host=localhost;port=5432;dbname=systmedb;"; 
    private $user = "postgres"; 
    private $password = "moussi@25"; 
    private $pdo; public function __construct() {
         $this->connect(); 
        }
         protected function connect() 
         { 
            try 
            { $this->pdo = new PDO($this->dsn,$this->user,$this->password); 
                $this -> pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this -> pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
                return $this->pdo; 
            } catch (PDOException $e) { 
                echo "Connection failed: " . $e->getMessage(); 
            }
        } 
        public function getConnection(){ 
            return $this -> connect(); 
        } 
    } 
    $connec = new Database(); 
    $connec -> getConnection();