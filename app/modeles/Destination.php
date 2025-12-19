<?php
namespace app\modeles;

use PDO;

class Destination extends Model {
    private $id;
    private $addresse;

    public function setId($i) { $this->id = (int)$i; }
    public function setAddresse($a) { $this->addresse = $a; }
    public function getId() { return $this->id; }
    public function getAddresse() { return $this->addresse; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Destination");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Destination WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) { $this->setId($row['id']); $this->setAddresse($row['val'] ?? $row['addresse'] ?? null); }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Destination SET val = :val WHERE id = :id");
            $q->bindValue(':val',$this->addresse,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Destination (val) VALUES (:val)");
        $q->bindValue(':val',$this->addresse,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Destination WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
