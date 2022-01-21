<?php
require_once "database.php";
$params["name"] = "view_product_template.php";
$data = $the_db->getProductData($_GET["serial"])[0];
$params["price"] = $data["prezzo"];
$params["productName"] = $data["nome"];
$params["product_info"] = $data;
require "template/base.php";
?>

