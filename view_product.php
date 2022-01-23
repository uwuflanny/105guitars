<?php
require_once "database.php";
$params["name"] = "view_product_template.php";
$productSpecifications = $the_db->getProductSpecifications($_GET["serial"])[0];
$productInfo = $the_db->getProducts($_GET["serial"])[0];
$params["price"] = $productInfo["prezzo"];
$params["productName"] = $productInfo["nome"];

$params["front_image"] = $productSpecifications["front_image"];
$params["side_image"] = $productSpecifications["side_image"];
$params["back_image"] = $productSpecifications["back_image"];
$params["product_info"] = $productSpecifications;
require "template/base.php";
?>

