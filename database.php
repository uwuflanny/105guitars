<?php

require_once "functions.php";

class Database {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    }

    public function getProducts() {
        $res = $this->db->query(
            "select c.seriale
             from copia c, modello m
             where c.ID_MODELLO = m.codice");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

$the_db = new Database("localhost", "root", "toor", "105guitars", 3306);
?>
