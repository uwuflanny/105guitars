<?php
require_once "bootstrap_page.php";

if(is_set_and_not_empty($_SESSION["isadmin"]) && $_SESSION["isadmin"]) {
    header('Location: seller_profile.php');
    return;
}

$params["name"] = "cart_template.php";

$params["cart-notifications"] = $the_db->getCartNotifications($_SESSION["email"]);
if(isUserLoggedIn()){
    $_SESSION["articles-in-cart"] = array_map(function($v) {
        return $v["serials"];
    }, $the_db->getArticlesInCart($_SESSION["email"]));
}

//TODO: Controllare le notifiche prima del checkout
if(is_set_and_not_empty($_SESSION["articles-in-cart"])) {
    $params["articles"] = [];
    $params["scripts"] = ["js/cart.js"];
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

require "template/base_page.php"
?>

