<?php

class Database
{
    private static $dsn = "pgsql:host=localhost;port=5432;dbname=systemdb;";
    private static $user = "postgres";
    private static $password = "Youness";
    private static $pdo = null;

    // Méthode statique pour obtenir la connexion PDO
    public static function getConnection()
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(self::$dsn, self::$user, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;  // Stoppe l'exécution en cas d'erreur de connexion
            }
        }

        return self::$pdo;
    }
}
?>
