<?php
require_once "bootstrap_page.php";

// check if logged user is admin
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php?result=3');
    return;
}

if(isset($_POST["series"]) && !empty($_POST["series"])) {

    $uploadedfront = uploadImage("./images/products/", $_FILES["front-photo"]);
    $uploadedside = uploadImage("./images/products/", $_FILES["side-photo"]);
    $uploadedback = uploadImage("./images/products/", $_FILES["back-photo"]);

    // se una immagine viene copiata ma le altre no, non viene fatta la insert e il form dovra' riessere compilato.
    // l'immagine copiata alla prima richiesta non viene rimossa, ma alla seconda richiesta, verrà assegnato un nuovo nome alla nuova immagine,
    // nella cartella ci sarà così un'immagine duplicata inutile ma non dannosa
    if($uploadedfront[0] && $uploadedside[0] && $uploadedback[0]) {
        $the_db->addCopy($_POST["series"], $_POST["number-strings"], $_POST["color"], $_POST["body-material"], $_POST["price"], $uploadedfront[1], $uploadedside[1], $uploadedback[1]);
        header('Location: manage_product.php');
    }
}

$params["name"] = "manage_product_template.php";
$params["models"] = $the_db->getModelCodes();

require "template/base_page.php"
?>

