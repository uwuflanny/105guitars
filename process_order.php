<?php 
require_once 'bootstrap_page.php';

if(!isUserLoggedIn()) {
    header('Location: signup.php');
}

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

foreach($_SESSION["articles-in-cart"] as $serial)
    removeArticleFromCart($serial, $the_db);

require 'template/base_page.php';
?>
