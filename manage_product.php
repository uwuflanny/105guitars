<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php');
}else{
    $params["name"] = "manage_product_template.php";
}

require "template/base_page.php"
?>

