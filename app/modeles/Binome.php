<?php
namespace app\modeles;

use PDO;

class Binome extends Model {
    private $id;
    private $idLivreur;
    private $idVehicule;

    public function setId($i) { $this->id = (int)$i; }
    public function setIdLivreur($l) { $this->idLivreur = (int)$l; }
    public function setIdVehicule($v) { $this->idVehicule = (int)$v; }
    public function getId() { return $this->id; }
    public function getIdLivreur() { return $this->idLivreur; }
    public function getIdVehicule() { return $this->idVehicule; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Binome");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM Binome WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) { $this->setId($row['id']); $this->setIdLivreur($row['idLivreur'] ?? $row['id_livreur'] ?? null); $this->setIdVehicule($row['idVehicule'] ?? $row['id_vehicule'] ?? null); }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE Binome SET idLivreur = :idl, idVehicule = :idv WHERE id = :id");
            $q->bindValue(':idl',$this->idLivreur,PDO::PARAM_INT);
            $q->bindValue(':idv',$this->idVehicule,PDO::PARAM_INT);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO Binome (idLivreur, idVehicule) VALUES (:idl, :idv)");
        $q->bindValue(':idl',$this->idLivreur,PDO::PARAM_INT);
        $q->bindValue(':idv',$this->idVehicule,PDO::PARAM_INT);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM Binome WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
