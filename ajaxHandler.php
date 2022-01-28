<?php
//require_once "database.php";
require_once "bootstrap_page.php";

if(is_set_and_not_empty($_POST["action"]) && is_set_and_not_empty($_POST["value"])) {
        switch($_POST["action"]) {
            case "addToCart":
                addToCart($_POST["value"], $the_db);
                break;
        }
    }

    function addToCart($serial, $the_db) {
        //var_dump($the_db->getArticlesInCart("imposter@gmail.com"));
        if(is_numeric($serial)) {
            if($the_db->serialExists($serial)) {
                if(!$the_db->isSerialAlreadyTaken($serial)) {
                    echo "Ok";
                    addArticleToSessionCart($serial);
                } else
                    echo "This item is already taken"; 
            } else
                echo "This item doesn't exists";
        } else 
            echo "Invalid item";
    }


?>
