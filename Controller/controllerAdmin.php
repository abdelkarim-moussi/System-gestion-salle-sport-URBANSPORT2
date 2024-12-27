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