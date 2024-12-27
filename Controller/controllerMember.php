<?php
require_once("Model/modelMember.php");
require_once("Model/Reservation.php");
require_once("Model/modelAdmin.php");
setcookie('user_id','1',time()+3600*10*90,"/");

function inscriptionView(){
    require_once("Views/visiteurViews/inscription.php");
}
function viewDetails(){
    require_once("Views/visiteurViews/details.php");
}


function selectUser(){
    $modelMemeber = new modelMemeber(Database::getConnection());
    $result=$modelMemeber->afficherInfos($_SESSION["userId"]);
    require_once("Views/memberViews/profile.php");
    return $result;


}

function UpdateInformationAction(){
    if (isset($_COOKIE['user_id'],$_POST["last_name"],$_POST['first_name'],$_POST['email'])) {
        $firstname = $_POST["first_name"];
        $user_id     = $_COOKIE['user_id'];
        $lastname = $_POST["last_name"];
        $email = $_POST["email"];
        $modelMemeber = new modelMemeber(Database::getConnection());
        $modelMemeber->modifierInfos($user_id,$lastname,$firstname,$email);
        selectUser();
        }else{
        echo "error";
    }


}
function MembreReservations(){
    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE["user_id"];
        $modelReservation = new Reservation(DataBase::getConnection());
       $result =  $modelReservation->Member_showReservations($user_id);
       require_once("Views/memberViews/reservations.php");
    }
}
function annulerReservation(){
    if (isset($_GET["idres"],$_COOKIE['user_id'])) {
        $user_id = $_COOKIE["user_id"];
        $idReservation = $_GET["idres"];
        $modelReservation = new Reservation(DataBase::getConnection());
        $modelReservation->Member_AnnulerReservation($idReservation,$user_id);

    }
}
function UserListActivities(){
    $activite = new Activite(Database::getConnection());
    $activities  = $activite->Admin_showActivities();
    require_once("Views/memberViews/Activities.php");

}

function reserverActivity(){
    echo"heloe";
    echo $_COOKIE["user_id"];
    echo $_POST["capacity"];
    echo $_GET["id"];

    if(isset($_COOKIE["user_id"],$_POST["capacity"],$_GET["id"])){
        $idMember = $_COOKIE["user_id"];
        $capacite = $_POST["capacity"];
        $idActivity = $_GET["id"];
    $modelReservation = new Reservation(DataBase::getConnection());
    $modelReservation->Member_AjouterReservation($idMember,$idActivity,$capacite);
    }

}