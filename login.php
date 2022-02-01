<?php
//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "login_template.php";
/*
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

 */

// if user is logged -> logout user (unset session variables)
if (isset($_SESSION['email']))
{
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["isadmin"]);
    unset($_SESSION["articles-in-cart"]);
    //header(isset($_GET["result"]) && !empty($_GET["result"]) ? 'Location: login.php' : 'Location: login.php'.'?result='.$_GET["result"]);
    header('Location: login.php');
    return;
}

// check if the parameters are set and not empty
if(isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    // check user existance
    $login = $the_db->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login) > 0) {
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["name"] = $login[0]["nome"];
        $_SESSION["surname"] = $login[0]["cognome"];
        $_SESSION["isadmin"] = $login[0]["isadmin"];
        moveSessionItemCartToAccountCart($the_db, $_POST["email"]);
        header('Location: index.php');
        return;
    } else {        
        header('Location: login.php?result=1');
        return;
    }
}

require "template/base_page.php"

?>

