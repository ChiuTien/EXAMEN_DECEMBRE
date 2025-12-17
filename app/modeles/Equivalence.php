<?php
namespace app\modeles;

use PDO;

class Equivalence extends Model {
    private $id;
    private $pMin;
    private $pMax;
    private $prix;

    public function setId($i) { $this->id = (int)$i; }
    public function setPMin($m) { $this->pMin = $m; }
    public function setPMax($m) { $this->pMax = $m; }
    public function setPrix($p) { $this->prix = $p; }
    public function getId() { return $this->id; }
    public function getPMin() { return $this->pMin; }
    public function getPMax() { return $this->pMax; }
    public function getPrix() { return $this->prix; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Equivalence");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Equivalence WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setPMin($row['pMin'] ?? $row['p_min'] ?? null);
            $this->setPMax($row['pMax'] ?? $row['p_max'] ?? null);
            $this->setPrix($row['prix']);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Equivalence SET pMin = :pmin, pMax = :pmax, prix = :prix WHERE id = :id");
            $q->bindValue(':pmin',$this->pMin,PDO::PARAM_STR);
            $q->bindValue(':pmax',$this->pMax,PDO::PARAM_STR);
            $q->bindValue(':prix',$this->prix,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Equivalence (pMin, pMax, prix) VALUES (:pmin, :pmax, :prix)");
        $q->bindValue(':pmin',$this->pMin,PDO::PARAM_STR);
        $q->bindValue(':pmax',$this->pMax,PDO::PARAM_STR);
        $q->bindValue(':prix',$this->prix,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Equivalence WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
