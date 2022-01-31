<?php
//require_once "database.php";
require_once "bootstrap_page.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$params["name"] = "view_product_template.php";
$params["scripts"] = ["js/view_product.js"];
$productSpecifications = $the_db->getProductSpecifications($_GET["serial"])[0];

if(empty($productSpecifications)){
    header('Location: 404.php');
    return;
}

$params["price"] = $productSpecifications["Price"];
$params["color"] = $productSpecifications["Color"];
$params["productName"] = $productSpecifications["Name"];

$params["front_image"] = $productSpecifications["front_image"];
$params["side_image"] = $productSpecifications["side_image"];
$params["back_image"] = $productSpecifications["back_image"];
$params["serial"] = $_GET["serial"];

unset($productSpecifications["front_image"]);
unset($productSpecifications["side_image"]);
unset($productSpecifications["back_image"]);
unset($productSpecifications["Name"]);
unset($productSpecifications["Price"]);

$params["product_info"] = $productSpecifications;
require "template/base_page.php";
?>

