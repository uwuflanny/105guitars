<?php

//require_once "database.php";
require_once "bootstrap_page.php";

$params["name"] = "signup_template.php";

// if user is logged -> logout user (unset session variables)
if (isset($_SESSION['email']))
{
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["isadmin"]);  
    header('Location: login.php');
    return;
} 

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["surname"])){
//if(is_set_and_not_empty($_POST["email"]) && is_set_and_not_empty($_POST["password"]) && is_set_and_not_empty("surname") && is_set_and_not_empty("name")) {
    $alreadyRegistred = $the_db->checkUserDuplicate($_POST["email"]);
    if($alreadyRegistred == 0) {
        $the_db->addUser($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]);
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["surname"] = $_POST["surname"];
        $_SESSION["isadmin"] = false;
        moveSessionItemCartToAccountCart($the_db, $_POST["email"]);
        header('Location: index.php');
        return;
    }else{
        header('Location: signup.php?result=fail');
        return;
    }
}
require "template/base_page.php"
?>

