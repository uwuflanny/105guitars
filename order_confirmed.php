<?php


if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php?result=2');
    return;
}

$params["name"] = "order_confirmed_template.php";

require "template/base_page.php"
?>

