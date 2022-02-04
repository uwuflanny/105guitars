<?php
require_once "bootstrap_page.php";


//TODO: fare la generazione della tabella dinamicamente con ajax
//inserire token
$params["name"] = "cart_template.php";
if(is_set_and_not_empty($_SESSION["articles-in-cart"])) {
    $params["articles"] = [];
    $params["scripts"] = ["js/cart.js"];
    $token = bin2hex(random_bytes(16));
    $_SESSION["token"] = $token;
    $params["total-cost"] = 0;
    foreach($_SESSION["articles-in-cart"] as $articleSerial) {
        $temp = new stdClass();
        $product = $the_db->getProductSpecifications($articleSerial)[0];
        $temp->img = $product["side_image"];
        $temp->namee = $product["Name"]."-".$product["Color"];
        $temp->price = $product["Price"];
        $temp->serial = $articleSerial;
        array_push($params["articles"], $temp);
        $params["total-cost"] += $product["Price"];
    }

}
/*
if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
}
 */

require "template/base_page.php"
?>

