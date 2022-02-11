<?php
require_once 'bootstrap_page.php';

if(is_set_and_not_empty($_POST["paymentMethod"]) && is_set_and_not_empty($_POST["name"]) && 
    is_set_and_not_empty($_POST["number"]) && is_set_and_not_empty($_POST["expiration"]) &&
    is_set_and_not_empty($_POST["cvv"]))
{
    $tmp = explode(" ", $_POST["name"]);
    $name = $tmp[0];
    $surname = $tmp[1];
    $type = $_POST["paymentMethod"];
    $cvv = $_POST["cvv"];
    $number = $_POST["number"];
    $expiration = $_POST["expiration"];
    $expiration .= "-01";
    $_SESSION["paymentAuthorized"] = false;
    if($the_db->verifyCard($name, $surname, $number, $cvv, $expiration, $type)) {
        $cartTotal = $the_db->getCartCost($_SESSION["email"]);
        echo $cartTotal;
        if($the_db->withDrawFromCard($number, $cvv, $expiration, $cartTotal))
            $_SESSION["paymentAuthorized"] = true;
    }
    header('Location: process_order.php');
    return;
}


require 'template/checkout_template.php';
?>
