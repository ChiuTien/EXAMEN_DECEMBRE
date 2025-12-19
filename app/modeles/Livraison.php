<?php
namespace app\modeles;

use PDO;

class Livraison extends Model {
    private $id;
    private $idBinome;
    private $idDay;
    private $idZone;
    private $idColis;

    public function setId($i) { $this->id = (int)$i; }
    public function setIdBinome($b) { $this->idBinome = (int)$b; }
    public function setIdDay($d) { $this->idDay = (int)$d; }
    public function setIdZone($z) { $this->idZone = (int)$z; }
    public function setIdColis($c) { $this->idColis = (int)$c; }
    public function getId() { return $this->id; }
    public function getIdBinome() { return $this->idBinome; }
    public function getIdDay() { return $this->idDay; }
    public function getIdZone() { return $this->idZone; }
    public function getIdColis() { return $this->idColis; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Livraison");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Livraison WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setIdBinome($row['idBinome'] ?? $row['id_binome'] ?? null);
            $this->setIdDay($row['idJour'] ?? $row['id_jour'] ?? $row['idDay'] ?? null);
            $this->setIdZone($row['idZone'] ?? $row['id_zone'] ?? null);
            $this->setIdColis($row['idColis'] ?? $row['id_colis'] ?? null);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Livraison SET idBinome = :b, idDay = :d, idZone = :z, idColis = :c WHERE id = :id");
            $q->bindValue(':b',$this->idBinome,PDO::PARAM_INT);
            $q->bindValue(':d',$this->idDay,PDO::PARAM_INT);
            $q->bindValue(':z',$this->idZone,PDO::PARAM_INT);
            $q->bindValue(':c',$this->idColis,PDO::PARAM_INT);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Livraison (idBinome, idJour, idZone, idColis) VALUES (:b, :d, :z, :c)");
        $q->bindValue(':b',$this->idBinome,PDO::PARAM_INT);
        $q->bindValue(':d',$this->idDay,PDO::PARAM_INT);
        $q->bindValue(':z',$this->idZone,PDO::PARAM_INT);
        $q->bindValue(':c',$this->idColis,PDO::PARAM_INT);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Livraison WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
