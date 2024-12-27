<?php
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
                require_once "Model/User.php";
                $user = new User($this->pdo, $firstName, $lastName, $email, $phone, $hashedPassword);
                if ($user->createUser()) {
                    echo "<script>alert('Your account is successfully created!')</script>";
                } else {
                    echo "<script>alert('Failed to create your account.')</script>";
                }
        }
    }
}
?>
