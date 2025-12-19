<?php
namespace app\modeles;

use PDO;

class TableDay extends Model {
    private $id;
    private $jour;
    private $idMonth;

    public function setId($i) { $this->id = (int)$i; }
    public function setJour($j) { $this->jour = $j; }
    public function setIdMonth($m) { $this->idMonth = (int)$m; }
    public function getId() { return $this->id; }
    public function getJour() { return $this->jour; }
    public function getIdMonth() { return $this->idMonth; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableDay");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableDay WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) { $this->setId($row['id']); $this->setJour($row['jour']); $this->setIdMonth($row['idMonth'] ?? $row['id_month'] ?? null); }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE TableDay SET jour = :jour, idMonth = :idMonth WHERE id = :id");
            $q->bindValue(':jour',$this->jour,PDO::PARAM_STR);
            $q->bindValue(':idMonth',$this->idMonth,PDO::PARAM_INT);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO TableDay (jour, idMonth) VALUES (:jour, :idMonth)");
        $q->bindValue(':jour',$this->jour,PDO::PARAM_STR);
        $q->bindValue(':idMonth',$this->idMonth,PDO::PARAM_INT);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM TableDay WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
