<?php
namespace app\modeles;

use PDO;

class ZoneLivraison extends Model {
    private $id;
    private $idEntrepot;
    private $idDestination;
    private $distance;

    public function setId($i) { $this->id = (int)$i; }
    public function setIdEntrepot($e) { $this->idEntrepot = (int)$e; }
    public function setIdDestination($d) { $this->idDestination = (int)$d; }
    public function setDistance($dist) { $this->distance = $dist; }
    public function getId() { return $this->id; }
    public function getIdEntrepot() { return $this->idEntrepot; }
    public function getIdDestination() { return $this->idDestination; }
    public function getDistance() { return $this->distance; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM ZoneLivraison");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM ZoneLivraison WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setIdEntrepot($row['idEntrepot'] ?? $row['id_entrepot'] ?? null);
            $this->setIdDestination($row['idDestination'] ?? $row['id_destination'] ?? null);
            $this->setDistance($row['distance']);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE ZoneLivraison SET idEntrepot = :ide, idDestination = :idd, distance = :dist WHERE id = :id");
            $q->bindValue(':ide',$this->idEntrepot,PDO::PARAM_INT);
            $q->bindValue(':idd',$this->idDestination,PDO::PARAM_INT);
            $q->bindValue(':dist',$this->distance,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO ZoneLivraison (idEntrepot, idDestination, distance) VALUES (:ide, :idd, :dist)");
        $q->bindValue(':ide',$this->idEntrepot,PDO::PARAM_INT);
        $q->bindValue(':idd',$this->idDestination,PDO::PARAM_INT);
        $q->bindValue(':dist',$this->distance,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM ZoneLivraison WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
