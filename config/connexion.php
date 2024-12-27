<?php

class Database
{
    private static $dsn = "pgsql:host=localhost;port=5432;dbname=systmedb;";
    private static $user = "postgres";
    private static $password = "moussi@25";
    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(self::$dsn, self::$user, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;  
            }
        }

        return self::$pdo;
    }
}
?>
