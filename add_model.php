<?php
require_once "bootstrap_page.php";

// check if logged user is admin
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php?result=3');
    return;
}

$params["name"] = "add_model_template.php";
require "template/base_page.php"
?>