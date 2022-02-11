<?php 
require_once 'bootstrap_page.php';

if(!isUserLoggedIn()) {
    header('Location: signup.php');
    return;
}

if((!isset($_SESSION["paymentAuthorized"])) || (!$_SESSION["paymentAuthorized"])) {
    header('Location: 404.php');
    return;
}

if(count($_SESSION["articles-in-cart"]) > 0) {
    $order_id = $the_db->insertOrder($_SESSION["email"], $_SESSION["articles-in-cart"]);


    $text = "l'ordine contiene i seguenti strumenti:";
    $articlesInfo = "";
    foreach($_SESSION["articles-in-cart"] as $serial) {
        $text .= " ".$serial;
        $specs = $the_db->getProductSpecifications($serial)[0];
        $articlesInfo .= sprintf("- %s - %s \n", $specs["Name"], $specs["Color"]);
    }

    $the_db->notifyUser(sprintf("Order #%s confirmed!", $order_id), sprintf("Your order containing: \n %s has been confirmed!", $articlesInfo), $_SESSION["email"]);

    $admins = $the_db->getAdminEmails();
    // notify admins about the order
    foreach($admins as $admin) {
        $the_db->notifyUser($_SESSION["email"]." ha fatto un ordine", $text, $admin["email"]);
    }
    // notify admins about enden products
    // TODO migliorare, ad ogni ordine viene spam di queste notifiche
    $endenProducts = $the_db->getEndenModels();
    foreach($endenProducts as $endenProduct) {
        foreach($admins as $admin) {
            $the_db->notifyUser($endenProduct["nome"]." out of stock", "All the instruments of this model are out of stock. Model code: ".$endenProduct["codice"], $admin["email"]);
        }
    }

    $params["name"] = "order_confirmed_template.php";
    
    //Notify users who had the same articles in the cart
    foreach($_SESSION["articles-in-cart"] as $serial) {
        removeArticleFromCart($serial, $the_db);
        $users = $the_db->getUsersHavingArticleInCart($serial);
        $articleSpecifications = $the_db->getProductSpecifications($serial)[0];
        $articleName = $articleSpecifications["Name"]."-".$articleSpecifications["Color"];
        foreach($users as $user) {
            $the_db->notifyUser("Article removed from cart", "The article ".$articleName." is out of stock.", $user, true);
            $the_db->removeArticleFromCart($user, $serial);
        }
    }

    $_SESSION["paymentAuthorized"] = false;

    require 'template/base_page.php';
} else {
    header('Location: index.php');
}

?>
