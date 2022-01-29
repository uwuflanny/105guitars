<?php

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
} else {
    $params["name"] = "user_profile_template.php";
}

require "template/base_page.php"
?>

