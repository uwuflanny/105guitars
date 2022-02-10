<?php
require_once "bootstrap_page.php";

$params["name"] = "index_template.php";
$params["products"] = $the_db->getProducts();
$params["rand_nums"] = array(
    0 => rand(0, count($params["products"])),
    1 => rand(0, count($params["products"])),
    2 => rand(0, count($params["products"])),
);

require "template/base_page.php"
?>

