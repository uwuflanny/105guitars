<?php 
//require_once "database.php";
require_once "bootstrap_page.php";

$params["profile-url"] = "login.php";
$params["user-name"] = "";
$params["articles-in-cart"] = !is_set_and_not_empty($_SESSION["articles-in-cart"]) ? 0 : count($_SESSION["articles-in-cart"]);
$params["jquery-source"] = "https://code.jquery.com/jquery-3.6.0.min.js";

if(isUserLoggedIn()) {
    $params["profile-url"] = $_SESSION["isadmin"] ? "seller_profile.php" : "user_profile.php";
    $params["user-name"] = $_SESSION["name"];
}

require "base.php";
?>
