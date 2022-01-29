<?php
$params["name"] = "order_confirmed_template.php";

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
}

require "template/base_page.php"
?>

