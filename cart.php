<?php
require_once "bootstrap_page.php";


//TODO: fare la generazione della tabella dinamicamente con ajax
if(is_set_and_not_empty($_SESSION["articles-in-cart"])) {
    $params["name"] = "cart_template.php";
    $params["articles"] = [];
    
    foreach($_SESSION["articles-in-cart"] as $articleSerial) {
        $temp = new stdClass();
        $product = $the_db->getProductSpecifications($articleSerial)[0];
        $temp->img = $product["side_image"];
        $temp->namee = $product["Name"];
        $temp->price = $product["Price"];
        array_push($params["articles"], $temp);
    }

}

/*
if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php');
} else {
}
 */

require "template/base_page.php"
?>

