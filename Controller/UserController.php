<?php
session_start();
require_once "Model/User.php";

class UserController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function userSubmission() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          
            $firstName = trim($_POST["fname"]);
            $lastName = trim($_POST["lname"]);
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirm-password"]);

            $errors = [];

          
            if (empty($firstName)) {
                $errors[] = "First name is required.";
            }

            if (empty($lastName)) {
                $errors[] = "Last name is required.";
            }

            if (empty($email)) {
                $errors[] = "Email is required.";
            }

            if (empty($password)) {
                $errors[] = "Password is required.";
            }

            if ($password !== $confirmPassword) {
                $errors[] = "Passwords do not match.";
            }

            
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<script>alert('$error')</script><br>";
                }
                return;
            }

            // Hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $user = new User($this->pdo);
                
                if ($user->createUser($firstName, $lastName, $email, $phone, $hashedPassword)) {
                    echo "<script>alert('Your account is successfully created!')</script>";
                } else {
                    echo "<script>alert('Failed to create your account.')</script>";
                }
        }
    }



    public function UserLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);

                if (empty($email)) {
                    echo "Email is required.";
                    return;
                }
                if (empty($password)) {
                    echo "Password is required.";
                    return;
                }

                $user = new User($this->pdo);
                if ($user->signIn($email, $password)) {
                    echo "User logged in with email: ", $_SESSION["email"] .'<br>and<br>'.$_SESSION["userId"]."<br>";
                    echo "connected";
                    if($_SESSION["role"] === "admin"){
                        header("Location:http://localhost/System-gestion-salle-sport-URBANSPORT2/index.php?action=dashBoardView");
                    }
                    else if($_SESSION["role"] === "member"){
                        header("Location:http://localhost/System-gestion-salle-sport-URBANSPORT2/index.php?action=profileView");
                    }
                } else {
                    echo "failed";
                }
            } else {
                echo "Email and password are required.";
            }
        } else {
            echo "Invalid request method.";
        }
    }


    public function InscriptionForm() {
        require_once "Views/visiteurViews/inscription.php";
    }

    public function loginForm() {
        require_once "Views/visiteurViews/login.php";
    }

    function allActivities(){
        $activite = new Activite(Database::getConnection());
        $activities  = $activite->Admin_showActivities();
        require_once("Views/visiteurViews/allActivities.php");
    }
}
?>
