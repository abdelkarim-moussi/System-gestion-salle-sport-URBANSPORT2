<?php
require_once "config/connexion.php";
require_once("Controller/controllerAdmin.php");
require_once("Controller/controllerMember.php");
echo "hello";
if(isset($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}

switch ($action) {
  
    case 'inscriptionForm':
        inscriptionAction();
        break;
    case 'inscriptionAction':
        inscriptionAction();
        break;
    case 'profileView':
        profileView();
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
    
    default:
    selectUser();     
    break;
}
?>
