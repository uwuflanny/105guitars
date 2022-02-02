<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php?result=2');
    return;
}

$params["name"] = "orders_template.php";
$params["orders"] = $the_db->getUserOrders($_SESSION["email"]);
$params["specifications"] = array();

foreach ($params["orders"] as $order) {
    $params["specifications"] += array($order["codice_ordine"] => $the_db->getOrderSpecification($order["codice_ordine"]));
}

require "template/base_page.php"
?>


