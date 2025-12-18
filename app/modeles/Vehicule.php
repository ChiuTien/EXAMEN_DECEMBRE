<?php
namespace app\modeles;

use PDO; 

class Vehicule extends Model {
    private $id;
    private $matricule;
    private $idCarburant;

    // Setters
    public function setId($i) { $this->id = (int)$i; }
    public function setMatricule($m) { $this->matricule = $m; }
    public function setIdCarburant($c) { $this->idCarburant = (int)$c; }

    // Getters
    public function getId() { return $this->id; }
    public function getMatricule() { return $this->matricule; }
    public function getIdCarburant() { return $this->idCarburant; }

    // Methods
    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Vehicule");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Vehicule WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setMatricule($row['matricule']);
            $this->setIdCarburant($row['carburant'] ?? $row['idCarburant'] ?? null);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Vehicule SET matricule = :matricule, carburant = :car WHERE id = :id");
            $q->bindValue(':matricule',$this->matricule,PDO::PARAM_STR);
            $q->bindValue(':car',$this->idCarburant,PDO::PARAM_INT);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Vehicule (matricule, carburant) VALUES (:matricule, :car)");
        $q->bindValue(':matricule',$this->matricule,PDO::PARAM_STR);
        $q->bindValue(':car',$this->idCarburant,PDO::PARAM_INT);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Vehicule WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
