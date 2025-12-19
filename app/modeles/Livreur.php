<?php
namespace app\modeles;

use PDO;

class Livreur extends Model {
    //Attribtuts
    private $id;
    private $nom;

    // Setters
    public function setId($i) { $this->id = (int)$i; }
    public function setNom($n) { $this->nom = $n; }

    // Getters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }

    // Methods
        public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Livreur");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Livreur WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setNom($row['nom']);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Livreur SET nom = :nom WHERE id = :id");
            $q->bindValue(':nom',$this->nom,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Livreur (nom) VALUES (:nom)");
        $q->bindValue(':nom',$this->nom,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Livreur WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
