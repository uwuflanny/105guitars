<?php
require_once "database.php";
require_once "functions.php";
require_once "mail.php";
$the_db = new Database("localhost", "root", "", "105guitars", 3306);
$mail = new mail("", "");
session_start();
?>
