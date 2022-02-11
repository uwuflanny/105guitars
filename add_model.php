<?php
require_once "bootstrap_page.php";

function myAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

// check if logged user is admin
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php?result=3');
    return;
}

if(isset($_POST["name"]) && !empty($_POST["name"])) {
    $the_db->addModel($_POST["name"], $_POST["scale"], $_POST["body_type"], $_POST["electronics"]);
    header('Location: add_model.php');
}

$params["name"] = "add_model_template.php";
require "template/base_page.php"
?>