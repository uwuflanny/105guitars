<?php
require_once "database.php";
$params["name"] = "seller_template.php";
$params["models"] = $the_db->getAllModels();
require "template/base_page.php"
?>
