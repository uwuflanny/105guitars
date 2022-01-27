<?php
require_once "database.php";

$params["name"] = "login_template.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $login = $the_db->checkLogin($_POST["email"], $_POST["password"]);
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["nome"] = $login[0]["nome"];
    $_SESSION["cognome"] = $login[0]["cognome"];
    $_SESSION["isadmin"] = $login[0]["isadmin"];
    header('Location: index.php');
}

require "template/base_page.php"
?>

