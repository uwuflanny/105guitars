<?php
require_once "database.php";
$params["name"] = "products_template.php";
$params["products"] = $the_db->getProducts();
require "template/base_page.php"
?>

