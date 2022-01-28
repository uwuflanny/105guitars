<?php

require_once "functions.php";

class Database {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getProducts() {
        $res = $this->db->query("select c.seriale as seriale, m.nome as nome, c.prezzo as prezzo, c.front_image
                                 from copia c, modello m
                                 where c.ID_MODELLO = m.codice");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function getProductSpecifications($serial) {
        $stmt = $this->db->prepare("select c.num_corde as \"String Number\", 
                                    m.scala as Scale, m.elettronica as Electronics, c.colore as Color, c.prezzo as Price, m.nome as Name,
                                    c.materiale as Material, c.front_image, c.side_image, c.back_image
                                    from copia c, modello m
                                    where c.seriale = ? and c.ID_MODELLO = m.codice;");
        $stmt->bind_param("i", $serial);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllModels() {
        return $this->db->query("select * from modello;");
    }

    public function getNumberOfCopies($id) {
        $stmt = $this->db->prepare("select count(*) as CopyNumber from copia where ID_MODELLO = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function getNumberOfArticlesInCart($userEmail) {
        $stmt = $this->db->prepare("select count(*) as articles
                                    from oggetto_in_carrello as oc
                                    where oc.ID_UTENTE = ?;");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        return $stmt->get_result()->fetch_object()->articles;
    }

    function addArticleToCart($userEmail, $serial) {
        $stmt = $this->db->prepare("insert into oggetto_in_carrello values(?, ?);");
        $stmt->bind_param("si", $userEmail, $serial);
        $stmt->execute();
    }

    function checkLogin($userEmail, $password) {
        $stmt = $this->db->prepare("select nome, cognome, isadmin
                                    from utente
                                    where email = ? and passw = ?;");
        $stmt->bind_param("ss", $userEmail, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

$the_db = new Database("localhost", "root", "", "105guitars", 3306);
session_start();
?>
