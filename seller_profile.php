<?php
//require_once "database.php";
require_once "bootstrap_page.php";

if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php');
} else {
    $params["name"] = "seller_template.php";
    $params["models"] = $the_db->getAllModels();
}

require "template/base_page.php"
?>
