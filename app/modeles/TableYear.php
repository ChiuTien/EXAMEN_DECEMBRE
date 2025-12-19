<?php
namespace app\modeles;

use PDO;

class TableYear extends Model {
    private $id;
    private $val;

    public function setId($i) { $this->id = (int)$i; }
    public function setVal($v) { $this->val = $v; }
    public function getId() { return $this->id; }
    public function getVal() { return $this->val; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableYear");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM TableYear WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) { $this->setId($row['id']); $this->setVal($row['val']); }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE TableYear SET val = :val WHERE id = :id");
            $q->bindValue(':val',$this->val,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO TableYear (val) VALUES (:val)");
        $q->bindValue(':val',$this->val,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM TableYear WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
