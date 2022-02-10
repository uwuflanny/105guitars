<?php
require_once "bootstrap_page.php";

if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php?result=3'); 
    return;
} 

$params["name"] = "seller_template.php";
$params["scripts"] = ["js/seller.js"];
$params["models"] = $the_db->getAllModels();
$params["orders"] = $the_db->getAllOrders();

$orders["all"]       = $params["orders"];
$orders["prep"]      = array_filter($params["orders"], function ($e) { return $e["stato"] == "unprepared"; });
$orders["send"]      = array_filter($params["orders"], function ($e) { return $e["stato"] == "unsent";     });
$orders["sent"]      = array_filter($params["orders"], function ($e) { return $e["stato"] == "sent";       });
$orders["delivered"] = array_filter($params["orders"], function ($e) { return $e["stato"] == "delivered";  });
foreach ($params["orders"] as $order):
    $id = $order["codice_ordine"];
    $params["order_" . $id] = $the_db->retrieveOrderCopies($id);
endforeach;

require "template/base_page.php"
?>
