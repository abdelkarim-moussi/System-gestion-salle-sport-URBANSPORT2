<?php
require_once("Model/modelAdmin.php");
require_once("Model/Activities.php");
require_once("Model/modelMember.php");

function dashBoardView(){
    $activite = new Activite(Database::getConnection());
    $activities  = $activite->CountActivities();
    
    $reservation = new Reservation(Database::getConnection());
    $reservations  = $reservation->CountReservation();

    $modelMemeber = new modelMemeber(Database::getConnection());
    $Memebers  = $modelMemeber->CountMembres();
    
    require_once("Views/adminViews/dashboard.php");
}
function AdminListReservation(){
    $reservation = new Reservation(Database::getConnection());
    $reservations  = $reservation->Admin_showReservations();
    require_once("Views/adminViews/listReservations.php");

}
function AdminListActivities(){
    $activite = new Activite(Database::getConnection());
    $activities  = $activite->Admin_showActivities();
    require_once("Views/adminViews/listActivities.php");

}
function AdminListMembers(){
    $modelMemeber = new modelMemeber(Database::getConnection());
    $Memebers  = $modelMemeber->afficherUsers();
    require_once("Views/adminViews/listMembers.php");

}
function addNewActivity(){
    echo "hello";
    if(isset($_POST["name_activity"],$_POST["description"],$_POST["start_date"],$_POST["end_date"],$_POST["capacity"])){
        $activite = new Activite(Database::getConnection());
        $name_activity = $_POST["name_activity"];
        $description = $_POST["description"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $capacity = $_POST["capacity"];
        echo "gg";

        $activite->AddActivite($name_activity,$description,$start_date,$end_date,$capacity);

        }
   

}
function DeleteActivity(){
    echo "hello";
    if(isset($_GET["id"])){
        $activite = new Activite(Database::getConnection());
        $idActivite = $_GET["id"];
        $activite->Admin_SupprimerActivite($idActivite);
        }
   

}