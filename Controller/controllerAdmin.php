<?php
require_once("Model/modelAdmin.php");

function homePageAction(){
    $result = selectSpecialities();
    require_once("Views/visiteurViews/home.php");
}