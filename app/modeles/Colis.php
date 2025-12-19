<?php
namespace app\modeles;

use PDO;

class Colis extends Model {
    //Attributs
    private $id;
    private $val;
    private $img;
    private $poids;

    //Setters
    public function setId($i) { $this->id = (int)$i; }
    public function setVal($v) { $this->val = $v; }
    public function setImg($i) { $this->img = $i; }
    public function setPoids($p) { $this->poids = $p; }

    //Getters
    public function getId() { return $this->id; }
    public function getVal() { return $this->val; }
    public function getImg() { return $this->img; }
    public function getPoids() { return $this->poids; }

    //Methods
    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Colis");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Colis WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setVal($row['val']);
            $this->setImg($row['img']);
            $this->setPoids($row['poids']);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Colis SET val = :val, img = :img, poids = :poids WHERE id = :id");
            $q->bindValue(':val',$this->val,PDO::PARAM_STR);
            $q->bindValue(':img',$this->img,PDO::PARAM_STR);
            $q->bindValue(':poids',$this->poids,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Colis (val, img, poids) VALUES (:val, :img, :poids)");
        $q->bindValue(':val',$this->val,PDO::PARAM_STR);
        $q->bindValue(':img',$this->img,PDO::PARAM_STR);
        $q->bindValue(':poids',$this->poids,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Colis WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
