<?php
namespace app\modeles;

use PDO;

class TableMonth extends Model {
    private $id;
    private $val;
    private $idYear;

    public function setId($i) { $this->id = (int)$i; }
    public function setVal($v) { $this->val = $v; }
    public function setIdYear($y) { $this->idYear = (int)$y; }
    public function getId() { return $this->id; }
    public function getVal() { return $this->val; }
    public function getIdYear() { return $this->idYear; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableMonth");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableMonth WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) { $this->setId($row['id']); $this->setVal($row['val']); $this->setIdYear($row['idYear'] ?? $row['id_year'] ?? null); }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE TableMonth SET val = :val, idYear = :idYear WHERE id = :id");
            $q->bindValue(':val',$this->val,PDO::PARAM_STR);
            $q->bindValue(':idYear',$this->idYear,PDO::PARAM_INT);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO TableMonth (val, idYear) VALUES (:val, :idYear)");
        $q->bindValue(':val',$this->val,PDO::PARAM_STR);
        $q->bindValue(':idYear',$this->idYear,PDO::PARAM_INT);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM TableMonth WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
