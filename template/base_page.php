<?php 
require_once "database.php";

$params["profile-url"] = "login.php";
$params["logged-user"] = "";
$params["articles-in-cart"] = 0;
if(isset($_SESSION["email"])) {
    $params["articles-in-cart"] = $the_db->getNumberOfArticlesInCart($_SESSION["email"]);
    $params["profile-url"] = $_SESSION["isadmin"] ? "seller_profile.php" : "user_profile.php";
    $params["logged-user"] = $_SESSION["nome"];
}

require "base.php";
?>
