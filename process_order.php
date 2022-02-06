<?php 
require_once 'bootstrap_page.php';

if(!isUserLoggedIn()) {
    header('Location: signup.php');
}

$the_db->insertOrder($_SESSION["email"], $_SESSION["articles-in-cart"]);
$params["name"] = "order_confirmed_template.php";

foreach($_SESSION["articles-in-cart"] as $serial)
    removeArticleFromCart($serial, $the_db);

require 'template/base_page.php';
?>
