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
        $res = $this->db->query("select c.seriale as seriale, m.nome as nome, c.prezzo as prezzo, c.front_image, c.sold
                                 from copia c, modello m
                                 where c.ID_MODELLO = m.codice");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvailableProducts() {
        $res = $this->db->query("select c.seriale as seriale, m.nome as nome, c.prezzo as prezzo, c.front_image, c.sold
                                 from copia c, modello m
                                 where c.ID_MODELLO = m.codice and c.sold = 0");
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
        $stmt = $this->db->prepare("insert into copia(ID_MODELLO, num_corde, colore, materiale, prezzo, front_image, side_image, back_image, sold)
                                    values(?, ?, ?, ?, ?, ?, ?, ?, 0);");
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
        $stmt = $this->db->prepare("delete from oggetto_in_carrello
                                    where oggetto_in_carrello.ID_COPIA = ? and oggetto_in_carrello.ID_UTENTE = ?;");
        $stmt->bind_param("is", $serial, $userEmail);
        $stmt->execute();
    }

    public function checkLogin($userEmail, $password) {
        $stmt = $this->db->prepare("select nome, cognome, isadmin, passw
                                    from utente
                                    where email = ? ;");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (password_verify($password, $res[0]["passw"])) {
            unset($res["passw"]);
            return $res;
        }
        return array();
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
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("insert into utente values(?, ?, ?, ?, 0);");
        $stmt->bind_param("ssss", $userEmail, $hash, $name, $surname);
        $stmt->execute();
    }

    public function isSerialAlreadyTaken($serial) {
        $stmt = $this->db->prepare("select count(*) as num
                                   from oggetto_in_ordine as oio
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

    public function getAllOrders() {
        return $this->db->query("select o.codice_ordine, o.data_ordine, o.stato, u.nome, u.cognome, u.email
                                 from ordine o, utente u
                                 where o.ID_UTENTE = u.email")->fetch_all(MYSQLI_ASSOC);
    }

    public function retrieveOrderCopies($order_id) {
        $stmt = $this->db->prepare("select m.nome as nome, m.scala as scala, c.num_corde as num_corde, c.colore as colore, c.materiale as material, c.prezzo as prezzo
                                    from oggetto_in_ordine o, copia c, modello m
                                    where o.ID_COPIA = c.seriale
                                    and c.ID_MODELLO = m.codice
                                    and o.ID_ORDINE = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserOrders($email) {
        $stmt = $this->db->prepare("select o.codice_ordine as codice_ordine, o.data_ordine as data_ordine, o.stato as stato
                                    from ordine o
                                    where o.ID_UTENTE = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderSpecification($codice) {
        $stmt = $this->db->prepare("select copia.prezzo as prezzo, copia.side_image as side_image
                                    from oggetto_in_ordine join copia on copia.seriale = oggetto_in_ordine.ID_COPIA
                                    where oggetto_in_ordine.ID_ORDINE = ?");
        $stmt->bind_param("i", $codice);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifications($email) {
        $stmt = $this->db->prepare("select * 
                                    from notifica
                                    where notifica.ID_UTENTE = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function fillOrder($order_id, $serials) {
        $stmt = $this->db->prepare("insert into oggetto_in_ordine values(?, ?);");
        $stmt2 = $this->db->prepare("update copia set copia.sold = 1 where copia.seriale = ?;");
        foreach($serials as $serial) {
            $stmt->bind_param("ii", $serial, $order_id);
            $stmt2->bind_param('i', $serial);
            $stmt->execute();
            $stmt2->execute();
        }
    }

    public function insertOrder($email, $serials) {
        $stmt = $this->db->prepare("insert into ordine values(NULL, now(), ?, 'unprepared');");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $this->fillOrder($this->db->insert_id, $serials);
    }

    public function getNextState($order_state) {
        switch ($order_state) {
        case "unprepared": return "unsent";
        case "unsent":     return "sent";
        case "sent":
        case "delivered":  return "delivered";
        default:           return "unprepared";
        }
    }

    public function changeOrderState($id) {
        $stmt = $this->db->prepare("select stato from ordine where codice_ordine = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $state = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["stato"];
        $next_state = $this->getNextState($state);
        $stmt = $this->db->prepare("update ordine set stato = ? where codice_ordine = ?;");
        $stmt->bind_param("si", $next_state, $id);
        $stmt->execute();
    }
}
?>
