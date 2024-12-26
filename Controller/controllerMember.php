<?php
require_once("Model/modelMember.php");
setcookie('user_id',1,time()+3600*10,"/");

function inscriptionView(){
    require_once("Views/visiteurViews/inscription.php");
}
function viewDetails(){
    require_once("Views/visiteurViews/details.php");
}
function profileView(){
    $result = selectInformations();
    require_once("Views/memberViews/profile.php");
}

function selectUser(){
    $modelMemeber = new modelMemeber(Database::getConnection());

    $result=$modelMemeber->afficherInfos(1);
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
        header("location:index.php?action=selectUser");
    }else{
        echo "error";
    }


}