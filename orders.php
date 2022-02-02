<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: login.php?result=2');
    return;
}

function calculateTotal($products) {
    $total = 0;
    foreach ($products as $item) {
        $total += $item["prezzo"];
    }
    return $total;
}

$params["name"] = "orders_template.php";
$params["orders"] = $the_db->getUserOrders($_SESSION["email"]);
$params["specifications"] = array();

foreach ($params["orders"] as $order) {
    $specs = $the_db->getOrderSpecification($order["codice_ordine"]);
    $params["specifications"] += array($order["codice_ordine"] => array($specs, calculateTotal($specs)));
}

require "template/base_page.php"
?>


