<?php
require_once "config/connexion.php";

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createUser($firstname, $lastname, $email, $phone, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO public.users (firstname, lastname, email, phone, password) 
        VALUES (:firstname, :lastname, :email, :phone, :password)");

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":password", $password);

        if ($stmt->execute()) {
            echo "account successfully created.";
            return true;
        } else {
            echo "Failed to create account.";
            return false;
        }
    }

    public function signIn($email, $password) {

        $stmt = $this->pdo->prepare("SELECT * FROM public.users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result && password_verify($password, $result['password'])) {
            session_unset();

            //session variables

            $_SESSION["email"] = $result["email"];
            $_SESSION["userId"] = $result["id_user"];
            $_SESSION["role"] = $result['role'];

            return true;
        } else {
            return false;
        }
    }
}
?>
