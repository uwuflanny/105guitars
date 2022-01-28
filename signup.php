<?php

//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "signup_template.php";
$params["alreadyRegistred"] = isset($_GET["alreadyRegistred"]) && ($_GET["alreadyRegistred"] == "fail");

if (isset($_SESSION['email']))
{
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["isadmin"]);  
    header('Location: login.php');
} else if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["surname"])){
    $alreadyRegistred = $the_db->checkUserDuplicate($_POST["email"]);
    if($alreadyRegistred == 0) {
        $the_db->addUser($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]);
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["surname"] = $_POST["surname"];
        $_SESSION["isadmin"] = false;
        header('Location: index.php');
    }else{
        header('Location: signup.php?alreadyRegistred=fail');
    }
}
require "template/base_page.php"
?>

