<?php

require_once "config/connexion.php";

class User {

    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $password;
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

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "acount succefully created .";
                return true;
            } else {
                echo "Failed to create account.";
                return false;
            }
    }

//     public function signIn($email,$password){
//  

//         // $hachedPass = password_verify($password,PASSWORD_BCRYPT);
//         // echo $hachedPass;
//         $sql = $this -> pdo -> prepare("SELECT id_user, email, password,role FROM public.users WHERE email = :email");
//         $sql -> bindParam(":email",$email);
//         // $sql -> bindParam(":password",$password);
        
//         $sql -> execute();
//         $result = $sql -> fetch();
    
//             if($result && password_verify($password,$result["password"])){
//                 $cookie_name = $email;
//                 $id_user = $result['id_user'];
//                 setcookie($cookie_name,$id_user,time() + (86400 * 30));
//             }
//         }

// }

public function signIn($email, $password) {
   
    $stmt = $this->pdo->prepare("SELECT * FROM public.users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result && password_verify($password, $result['password'])) {
    
        $_SESSION["email"] = $email;
        $_SESSION["userId"] = $result["id_user"];
        
        if($result["role"] === "admin"){
            header("Location:Views/adminViews/dashboard.php");
        }
        return true;
    } else {
        return false;
    }

}
}




