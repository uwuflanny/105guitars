<?php 
require_once 'bootstrap_page.php';

if(!isUserLoggedIn()) {
    header('Location: signup.php');
}

if(count($_SESSION["articles-in-cart"]) > 0) {
    $the_db->insertOrder($_SESSION["email"], $_SESSION["articles-in-cart"]);


    $text = "l'ordine contiene i seguenti strumenti:";
    foreach($_SESSION["articles-in-cart"] as $serial) {
        $text .= " ".$serial;
    }

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
            $the_db->notifyUser($endenProduct["nome"]." terminati", "tutti gli strumenti di questo specifico modello sono terminati. codice modello: ".$endenProduct["codice"], $admin["email"]);
        }
    }

    $params["name"] = "order_confirmed_template.php";

    foreach($_SESSION["articles-in-cart"] as $serial) {
        removeArticleFromCart($serial, $the_db);
        $users = $the_db->getUsersHavingArticleInCart($serial);
        $articleSpecifications = $the_db->getProductSpecifications($serial)[0];
        $articleName = $articleSpecifications["Name"]."-".$articleSpecifications["Color"];
        foreach($users as $user) {
            $the_db->notifyUser("Articolo rimosso dal carrello", "L'articolo ".$articleName." è esaurito", $user, true);
            $the_db->removeArticleFromCart($user, $serial);
        }
    }

    require 'template/base_page.php';
} else {
    header('Location: index.php');
}

?>
