<?php
//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "products_template.php";
if ($_GET["model"] == "all") {
    $params["products"] = $the_db->getAvailableProducts();
} else {
    $params["products"] = $the_db->getAvailableProductsFor($_GET["model"]);
}
$params["models"] = $the_db->getAllModels();
require "template/base_page.php"
?>
