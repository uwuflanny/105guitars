<?php
require_once "bootstrap_page.php";

if(is_set_and_not_empty($_POST["action"]) && is_set_and_not_empty($_POST["value"])) {
    switch($_POST["action"]) {
    case "addToCart":
        addToCart($_POST["value"], $the_db);
        break;
    case "moveOrder":
        changeOrderState($_POST["value"], $the_db);
        break;
    case "removeFromCart":
        removeFromCart($_POST["value"], $the_db);
        break;
    }
}

function addToCart($serial, $the_db) {
    $response = new stdClass();
    $response->statusCode = 1;

    if(is_numeric($serial)) {
        if($the_db->serialExists($serial)) {
            if(!$the_db->isSerialAlreadyTaken($serial)) {
                $response->statusCode = 0;
                $response->numProducts = addArticleToCart($serial, $the_db);
            } else
                $response->statusString = "This item is already taken"; 
        } else
            $response->statusString = "This item doesn't exists";
    } else
        $response->statusString = "Invalid item";
    echo json_encode($response);
}

function removeFromCart($serial, $the_db) {
    $response = new stdClass();
    $response->statusCode = 1;

    if(is_numeric($serial)) {
        if($the_db->serialExists($serial)) {
            if(in_array($serial, $_SESSION["articles-in-cart"])) {
                $response->statusCode = 0;
                $response->numProducts = removeArticleFromCart($serial, $the_db);
            } else
                $response->statusString = "You don't have this item in your cart";
        } else
            $response->statusString = "This item doesn't exists";
    } else
        $response->statusString = "Invalid item";
    
    echo json_encode($response);
}

function changeOrderState($id, $the_db) {
    $the_db->changeOrderState($id);
    $response = new stdClass();
    $response->statusCode = 0;
    echo json_encode($response);
}
?>
