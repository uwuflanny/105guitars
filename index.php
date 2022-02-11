<?php
require_once "bootstrap_page.php";

$params["name"] = "index_template.php";
$params["products"] = $the_db->getAvailableProducts();

if (!empty($params["products"])) {
    $range = range(0, count($params["products"]) - 1);
    shuffle($range);
    $params["rand_nums"]  = array_slice($range, 0, (count($params["products"]) < 3 ? count($params["products"]) : 3));
}

require "template/base_page.php"
?>

