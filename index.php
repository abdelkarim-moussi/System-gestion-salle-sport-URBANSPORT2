<?php
require_once "config/connexion.php";
require_once("Controller/controllerAdmin.php");
require_once("Controller/controllerMember.php");
require_once "Controller/userController.php";

$pdo = new Database();
$connec = $pdo->getConnection();

$userc = new UserController($connec);

if(isset($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}

switch ($action) {
  
    case 'inscriptionForm':
        $userc->InscriptionForm();
        break;
    case 'inscriptionAction':
        $userc -> userSubmission() ;
        break;
    case 'loginForm':
        $userc -> loginForm() ;
        break;
    case 'signAction':
        $userc -> UserLogin();
        break;
    case 'profileView':
        // profileView();
        break;
    case 'UpdateProfile':
        UpdateInformationAction();
        break;
    case 'viewDetails':
        viewDetails();
        break;
    case 'FormUsertUser':
        selectUser();
        break;
    case 'MembreReservations':
        MembreReservations();
        break;
    case 'annulerReservation':
        annulerReservation();
        break;
    case 'dashBoardView':
        dashBoardView();
        break;
    case 'ListActivities':
        AdminListActivities();
        break;
    case 'ListReservations':
        AdminListReservation();
        break;
    case 'ListMembers':
        AdminListMembers();
        break;
    case 'addNewActivity':
        addNewActivity();
        break;
    case 'allActivities':
        $userc->allActivities();
        break;
    
    default:
    selectUser();     
    break;
}
?>
