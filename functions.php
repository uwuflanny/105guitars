<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return is_set_and_not_empty($_SESSION["email"]);
}

function debug($var) {
    echo "<script>console.log($var);</script>";
}

function registerLoggedUser($user){
    $_SESSION["idautore"] = $user["idautore"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nome"] = $user["nome"];
}

function is_set_and_not_empty(&$var) {
    return isset($var) && !empty($var);
}

function addArticleToCart($article, $db) {
    if(!isset($_SESSION["articles-in-cart"]) || empty($_SESSION["articles-in-cart"]))
        $_SESSION["articles-in-cart"] = array();
    if(!in_array($article, $_SESSION["articles-in-cart"])) {
        array_push($_SESSION["articles-in-cart"], $article);
        if(isUserLoggedIn())
            $db->addArticleToCart($_SESSION["email"], $article);
    }
    return count($_SESSION["articles-in-cart"]);
}

function getItemsSerials($items) { 
    return array_map(function($v) {
        return $v["serials"];
    }, $items);
}

function moveSessionItemCartToAccountCart($db, $userEmail) {
    if (is_set_and_not_empty($_SESSION["articles-in-cart"])) {
        $articlesInSessionCart = $_SESSION["articles-in-cart"];
        //$articlesInAccountCart = array_map(function($v) { return $v["serials"]; } ,$db->getArticlesInCart($userEmail));
        $articlesInAccountCart = getItemsSerials($db->getArticlesInCart($userEmail));
        $allArticlesInCart = array_unique(array_merge($articlesInSessionCart, $articlesInAccountCart));
        $_SESSION["articles-in-cart"] = $allArticlesInCart;
        $articlesToAddToAccountCart = array_diff($allArticlesInCart, $articlesInAccountCart);
        foreach($articlesToAddToAccountCart as $article) {
            $db->addArticleToCart($userEmail, $article);
        }
    } else
        $_SESSION["articles-in-cart"] = getItemsSerials($db->getArticlesInCart($userEmail)); 
       //$_SESSION["articles-in-cart"] = array_map(function($v) {return $v["serials"]; }, $db->getArticlesInCart($userEmail));
}

function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 100000;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function orderButtonMessage($state) {
    switch ($state) {
    case "prep": return "preparato";
    case "send": return "spedito";
    case "sent": return "consegnato";
    default: return "";
    }
}
?>
