<?php
//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "login_template.php";
$params["isIncorrectLogin"] = isset($_GET["result"]) && ($_GET["result"] == "fail");

if (isset($_SESSION['email']))
{
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["isadmin"]);  
    header('Location: login.php');
} else {
    if(isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $login = $the_db->checkLogin($_POST["email"], $_POST["password"]);
        if(count($login) > 0) {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["name"] = $login[0]["nome"];
            $_SESSION["surname"] = $login[0]["cognome"];
            $_SESSION["isadmin"] = $login[0]["isadmin"];
            moveSessionItemCartToAccountCart($the_db, $_POST["email"]);

            header('Location: index.php');
        } else {
            header('Location: login.php?result=fail');
        }
    }
}

function moveSessionItemCartToAccountCart($db, $userEmail) {
    if (is_set_and_not_empty($_SESSION["articles-in-cart"])) {
        $articlesInSessionCart = $_SESSION["articles-in-cart"];
        $articlesInAccountCart = array_map(function($v) { return $v["serials"]; } ,$db->getArticlesInCart($userEmail));
        $allArticlesInCart = array_unique(array_merge($articlesInSessionCart, $articlesInAccountCart));
        $_SESSION["articles-in-cart"] = $allArticlesInCart;
        $articlesToAddToAccountCart = array_diff($allArticlesInCart, $articlesInAccountCart);
        foreach($articlesToAddToAccountCart as $article) {
            $db->addArticleToCart($userEmail, $article);
        }
    } else 
        $_SESSION["articles-in-cart"] = array_map(function($v) {return $v["serials"]; }, $db->getArticlesInCart($userEmail));
}

require "template/base_page.php"
?>

