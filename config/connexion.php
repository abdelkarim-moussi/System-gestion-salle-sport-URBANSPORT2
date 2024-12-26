<?php
class Database
{

    private $dsn = "pgsql:host=localhost;port=5432;dbname=systemdb;";
    private $user = "postgres";
   
    private $password = "Youness";
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        try {
        $this->pdo  = new PDO($this->dsn,$this->user,$this->password);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getConnection()
    {
        return $this->pdo;
    }
}
$db = new Database();
$conn = $db->getConnection();