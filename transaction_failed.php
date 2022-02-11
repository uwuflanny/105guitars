<?php
$params["name"] = "transaction_failed_template.php";

if(!isset($_GET["code"])) {
    header('Location: index.php');
    return;
}

$error = "";

switch($_GET["code"]) {
    case 1:
        $error = "Credit card informations are wrong";
        break;
    case 2:
        $error = "Not enough balance on cart";
        break;
    case 3:
        $error = "Unauthorized transaction";
        break;
    default:
        $error = "Unkown error";
        break;
}

$params["error"] = $error;


require "template/base_page.php"
?>
