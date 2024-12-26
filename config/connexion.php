<?php
function Connexion()
{

    $dsn = "pgsql:host=localhost;port=5432;dbname=LawCab;";
    $user = "postgres";
    $password = "Youness";

    try {
        $pdo = new PDO($dsn, $user, $password);

        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
