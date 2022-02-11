<?php
require_once 'bootstrap_page.php';

$params["name"] = "reset_password_template.php";

if(!isset($_SESSION["tmpEmail"]) || empty($_SESSION["tmpEmail"])) {
    header('Location: index.php');
    return;
}

$params["message"] = "Please insert the code that we sent to your email";

if(is_set_and_not_empty($_POST["reset-code"]) && is_set_and_not_empty($_POST["password"])) {
    if($the_db->verifyPasswordResetCode($_SESSION["tmpEmail"], $_POST["reset-code"])) {
        $the_db->updateUserPassword($_SESSION["tmpEmail"], $_POST["password"]);
        unset($_SESSION["tmpEmail"]);
        header('Location: password_reset_success.php');
        return;
    }

    $params["message"] = "The inserted code is invalid";
}


require "template/base_page.php"
?>
