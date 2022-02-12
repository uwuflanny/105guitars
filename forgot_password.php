<?php
require_once 'bootstrap_page.php';

$params["name"] = "forgot_password_template.php";
$params["message"] = "Please insert your email";

if(isUserLoggedIn()) {
    header('Location: index.php');
    return;
}

if(is_set_and_not_empty($_POST["email"])) {
    if($the_db->checkUserDuplicate($_POST["email"]) > 0) {
        $code = "";
        for($i = 0 ; $i < 5 ; $i++) {
            $code .= rand(0, 9);
        }

        $body = sprintf("Dear customer, <br> 
                         This is your reset code: <b>%s</b>", $code);
        $mail->sendEmail($_POST["email"], "Reset password", $body);
        $the_db->insertPasswordResetCode($_POST["email"], $code);
        $_SESSION["tmpEmail"] = $_POST["email"];
        header('Location: reset_password.php');
        return;
    } else {
        $params["message"] = "No users are registered with this email";
    }
}

require "template/base_page.php"
?>
