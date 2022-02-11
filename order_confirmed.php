<?php

if(!isset($_SESSION["email"]) || empty($_SESSION["email"])){
    header('Location: index.php');
    return;
}
if($_SESSION["isadmin"]) {
    header('Location: seller_profile.php');
    return;
}

$params["name"] = "order_confirmed_template.php";

require "template/base_page.php"
?>

