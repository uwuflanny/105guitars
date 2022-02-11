<?php

require_once "bootstrap_page.php";

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php?result=2');
    return;
} 

// if logged user is admin, gets redirected to admin page
if($_SESSION["isadmin"]){
    header('Location: seller_profile.php');
    return;
}

$params["name"] = "user_profile_template.php";

require "template/base_page.php"
?>

