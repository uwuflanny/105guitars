<?php
//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "products_template.php";
$params["products"] = $the_db->getAvailableProducts();
require "template/base_page.php"
?>

