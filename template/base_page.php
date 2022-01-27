<?php 
require_once "database.php";

$params["profile-url"] = "login.php";
$params["user-name"] = "";
$params["articles-in-cart"] = 0;

if(isset($_SESSION["email"])) {
    $params["articles-in-cart"] = $the_db->getNumberOfArticlesInCart($_SESSION["email"]);
    $params["profile-url"] = $_SESSION["isadmin"] ? "seller_profile.php" : "user_profile.php";
    $params["user-name"] = $_SESSION["name"];
}

require "base.php";
?>
