<?php
namespace app\modeles;

use PDO;

class TableDepense extends Model {
    private $id;
    private $salChauffeur;
    private $depCarburant;
    private $depEntretien;

    public function setId($i) { $this->id = (int)$i; }
    public function setSalChauffeur($s) { $this->salChauffeur = $s; }
    public function setDepCarburant($d) { $this->depCarburant = $d; }
    public function setDepEntretien($e) { $this->depEntretien = $e; }
    public function getId() { return $this->id; }
    public function getSalChauffeur() { return $this->salChauffeur; }
    public function getDepCarburant() { return $this->depCarburant; }
    public function getDepEntretien() { return $this->depEntretien; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableDepense");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableDepense WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setSalChauffeur($row['salChauffeur'] ?? $row['sal_chauffeur'] ?? null);
            $this->setDepCarburant($row['depCarburant'] ?? $row['dep_carburant'] ?? null);
            $this->setDepEntretien($row['depEntretien'] ?? $row['dep_entretien'] ?? null);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE TableDepense SET salChauffeur = :sal, depCarburant = :carb, depEntretien = :ent WHERE id = :id");
            $q->bindValue(':sal',$this->salChauffeur,PDO::PARAM_STR);
            $q->bindValue(':carb',$this->depCarburant,PDO::PARAM_STR);
            $q->bindValue(':ent',$this->depEntretien,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO TableDepense (salChauffeur, depCarburant, depEntretien) VALUES (:sal, :carb, :ent)");
        $q->bindValue(':sal',$this->salChauffeur,PDO::PARAM_STR);
        $q->bindValue(':carb',$this->depCarburant,PDO::PARAM_STR);
        $q->bindValue(':ent',$this->depEntretien,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM TableDepense WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
