<?php
require_once "database.php";
$params["name"] = "view_product_template.php";
$productSpecifications = $the_db->getProductSpecifications($_GET["serial"])[0];
// $productInfo = $the_db->getProducts($_GET["serial"])[0];

$params["price"] = $productSpecifications["Price"];
$params["color"] = $productSpecifications["Color"];
$params["productName"] = $productSpecifications["Name"];

$params["front_image"] = $productSpecifications["front_image"];
$params["side_image"] = $productSpecifications["side_image"];
$params["back_image"] = $productSpecifications["back_image"];

unset($productSpecifications["front_image"]);
unset($productSpecifications["side_image"]);
unset($productSpecifications["back_image"]);

$params["product_info"] = $productSpecifications;
require "template/base.php";
?>

