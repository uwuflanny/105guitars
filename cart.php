<?php

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
} else {
    $params["name"] = "cart_template.php";
}

require "template/base_page.php"
?>

