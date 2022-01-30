<?php
require_once "bootstrap_page.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false || empty($_SESSION["isadmin"])){
    header('Location: login.php');
}else{

    if(isset($_POST["series"]) && !empty($_POST["series"])) {

        $uploadedfront = uploadImage("./images/products/", $_FILES["front-photo"]);
        $uploadedside = uploadImage("./images/products/", $_FILES["side-photo"]);
        $uploadedback = uploadImage("./images/products/", $_FILES["back-photo"]);

        if($uploadedfront[0] && $uploadedside[0] && $uploadedback[0]) {
            $the_db->addCopy($_POST["series"], $_POST["number-strings"], $_POST["color"], $_POST["body-material"], $_POST["price"], $uploadedfront[1], $uploadedside[1], $uploadedback[1]);
        }
    }

    $params["name"] = "manage_product_template.php";
    $params["models"] = $the_db->getModelCodes();
}

require "template/base_page.php"
?>

