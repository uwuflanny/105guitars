<?php 
require_once 'bootstrap_page.php';

if(!isUserLoggedIn()) {
    header('Location: signup.php');
    return;
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


if(count($_SESSION["articles-in-cart"]) > 0) {
    $order_id = $the_db->insertOrder($_SESSION["email"], $_SESSION["articles-in-cart"]);

    // models that the order terminated
    $endedModels = array();

    // get admin emails
    $admins = $the_db->getAdminEmails();

    $text = "l'ordine contiene i seguenti strumenti:";
    $articlesInfo = "";
    foreach($_SESSION["articles-in-cart"] as $serial) {
        $text .= " ".$serial;
        $specs = $the_db->getProductSpecifications($serial)[0];
        $articlesInfo .= sprintf("- %s - %s \n", $specs["Name"], $specs["Color"]);
        $modelName = $specs["Name"];

        // update ended product list
        $cnt = $the_db->getAvailableCopiesOfModel($modelName);        
        if($cnt == 0 && !in_array($modelName, $endedModels)) {
            array_push($endedModels, $modelName);
        }
    }

    // notify user about placed oreder
    $the_db->notifyUser(sprintf("Order #%s confirmed!", $order_id), sprintf("Your order containing: \n %s has been confirmed!", $articlesInfo), $_SESSION["email"]);
    // notify admins about the order
    foreach($admins as $admin) {
        $the_db->notifyUser(sprintf("User #%s placed an order", $_SESSION["email"]), sprintf("Item List: \n %s", $articlesInfo), $admin["email"]);
    }
    // notify admins about ended products
    foreach($endedModels as $endedModel) {
        foreach($admins as $admin) {
            $the_db->notifyUser($endedModel." out of stock", "All the instruments of this model are out of stock.", $admin["email"]);
        }
    }

    $params["name"] = "order_confirmed_template.php";
    
    //Notify users who had the same articles in the cart
    foreach($_SESSION["articles-in-cart"] as $serial) {
        removeArticleFromCart($serial, $the_db);
        $users = $the_db->getUsersHavingArticleInCart($serial);
        $articleSpecifications = $the_db->getProductSpecifications($serial)[0];
        $articleName = $articleSpecifications["Name"]."-".$articleSpecifications["Color"];
        foreach($users as $user) {
            $the_db->notifyUser("Article removed from cart", "The article ".$articleName." is out of stock.", $user, true);
            $the_db->removeArticleFromCart($user, $serial);
        }
    }

    require 'template/base_page.php';
} else {
    header('Location: index.php');
}

?>
