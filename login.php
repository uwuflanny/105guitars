<?php
require_once "database.php";

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
            header('Location: index.php');
        } else {
            header('Location: login.php?result=fail');
        }
    }
}




require "template/base_page.php"
?>

