<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php');
}else{

    if(isset($_POST["series"]) && !empty($_POST["series"])) {
        $the_db->addCopy($_POST["series"], $_POST["number-strings"], $_POST["color"], $_POST["body-material"], $_POST["price"], $_POST["front-photo"], $_POST["side-photo"], $_POST["back-photo"]);
    }

    $params["name"] = "manage_product_template.php";
    $params["models"] = $the_db->getModelCodes();
}

require "template/base_page.php"
?>

