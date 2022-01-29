<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
} else {
    $params["name"] = "orders.php";
}

require "template/base_page.php"
?>


