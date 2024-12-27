<?php
require_once("Controller/controllerAdmin.php");
require_once("Controller/controllerMember.php");
echo "hello";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "home";
}

switch ($action) {
    case 'home':
        homePageAction();
        break;
    case 'inscriptionForm':
        inscriptionView();
        break;
    case 'inscriptionAction':
        inscriptionAction();
        break;
    case 'viewDetails':
        viewDetails();
        break;
    
    default:
        # code...
        break;
}