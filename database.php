<?php

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

    public function getProductSpecifications($serial) {
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

    public function getModelCodes() {
        $stmt = $this->db->prepare("select codice, nome from modello");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addCopy($modelId, $strings, $color, $material, $price, $front_image, $side_image, $back_image) {
        $stmt = $this->db->prepare("insert into copia(ID_MODELLO, num_corde, colore, materiale, prezzo, front_image, side_image, back_image)
                                    values(?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("iississs", $modelId, $strings, $color, $material, $price, $front_image, $side_image, $back_image);
        $stmt->execute();
    }

    public function getNumberOfCopies($id) {
        $stmt = $this->db->prepare("select count(*) as CopyNumber from copia where ID_MODELLO = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["CopyNumber"];
    }

    public function getArticlesInCart($userEmail) {
        $stmt = $this->db->prepare("select oc.ID_COPIA as serials
                                    from oggetto_in_carrello as oc
                                    where oc.ID_UTENTE = ? ;");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addArticleToCart($userEmail, $serial) {
        $stmt = $this->db->prepare("insert into oggetto_in_carrello values(?, ?);");
        $stmt->bind_param("si", $userEmail, $serial);
        $stmt->execute();
        //mysqli_stmt_affected_rows($stmt);
        return mysqli_error($this->db);
    }

    public function removeArticleFromCart($userEmail, $serial) {
        $stmt = $this->db->prepare("delete from oggetto_in_carrello as oio
                                    where oio.ID_COPIA = ? and oio.ID_UTENTE = ?;");
        $stmt->bind_param("is", $serial, $userEmail);
        $stmt->execute();
    }

    public function checkLogin($userEmail, $password) {
        $stmt = $this->db->prepare("select nome, cognome, isadmin
                                    from utente
                                    where email = ? and passw = ?;");
        $stmt->bind_param("ss", $userEmail, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function checkUserDuplicate($userEmail){
        $stmt = $this->db->prepare("select *
                                    from utente
                                    where email = ?");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        return count($stmt->get_result()->fetch_all(MYSQLI_ASSOC));
    }

    public function addUser($userEmail, $password, $name, $surname) {
        $stmt = $this->db->prepare("insert into utente values(?, ?, ?, ?, 0);");
        $stmt->bind_param("ssss", $userEmail, $password, $name, $surname);
        $stmt->execute();
    }

    public function isSerialAlreadyTaken($serial) {
        $stmt = $this->db->prepare("select count(*) as num
                                   from oggetto_in_carrello as oio
                                   where oio.ID_COPIA = ?;");
        $stmt->bind_param("i", $serial);
        $stmt->execute();
        return $stmt->get_result()->fetch_object()->num == 1;
    }

    public function serialExists($serial) {
        $stmt = $this->db->prepare("select count(*) as num
                                    from copia
                                    where copia.seriale = ?;");
        $stmt->bind_param("i", $serial);
        $stmt->execute();
        return $stmt->get_result()->fetch_object()->num == 1;
    }
}
?>
