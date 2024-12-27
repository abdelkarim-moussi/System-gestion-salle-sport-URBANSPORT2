<?php
require_once "config/connexion.php";
require_once("Controller/controllerAdmin.php");
require_once("Controller/controllerMember.php");
require_once("Controller/userController.php");

$pdo = new Database();
$connec = $pdo->getConnection();

$userc = new UserController($connec);

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "home";
}

switch ($action) {
    case 'home':
        homePageAction();
        break;
    case 'inscriptionForm':
        inscriptionAction();
        break;
    case 'inscriptionAction':
        $userc->userSubmission();
        break;
    case 'viewDetails':
        viewDetails();
        break;
    default:
        echo "Unknown action: " . htmlspecialchars($action);
        break;
}
?>
