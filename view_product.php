<?php
require_once "database.php";
$params["name"] = "view_product_template.php";
$productSpecifications = $the_db->getProductSpecifications($_GET["serial"])[0];
$productInfo = $the_db->getProducts($_GET["serial"])[0];
$params["price"] = $productInfo["prezzo"];
$params["productName"] = $productInfo["nome"];
$params["product_info"] = $productSpecifications;
require "template/base.php";
?>

