<?php
require_once "config/connexion.php";

class User {
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $password;
    private $pdo;

    public function __construct($pdo, $firstname, $lastname, $email, $phone, $password) {
        $this->pdo = $pdo;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function createUser() {
        
            // Préparer la requête SQL pour insérer un nouvel utilisateur
            $stmt = $this->pdo->prepare("INSERT INTO public.users (firstname, lastname, email, phone, password) 
            VALUES (:firstname, :lastname, :email, :phone, :password)");

            // Lier les paramètres
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":password", $this->password);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "acount succefully created .";
                return true;
            } else {
                echo "Failed to create account.";
                return false;
            }
    }
}
?>
