<?php
namespace app\modeles;

use PDO;

class RapportLivraison extends Model {
    private $id;
    private $idLivraison;
    private $idDepense;
    private $recette;
    private $difference;

    public function setId($i) { $this->id = (int)$i; }
    public function setIdLivraison($l) { $this->idLivraison = (int)$l; }
    public function setIdDepense($d) { $this->idDepense = (int)$d; }
    public function setRecette($r) { $this->recette = $r; }
    public function setDifference($d) { $this->difference = $d; }

    public function getId() { return $this->id; }
    public function getIdLivraison() { return $this->idLivraison; }
    public function getIdDepense() { return $this->idDepense; }
    public function getRecette() { return $this->recette; }
    public function getDifference() { return $this->difference; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM RapportLivraison");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM RapportLivraison WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setIdLivraison($row['idLivraison'] ?? $row['id_livraison'] ?? null);
            $this->setIdDepense($row['idDepense'] ?? $row['id_depense'] ?? null);
            $this->setRecette($row['recette']);
            $this->setDifference($row['difference'] ?? null);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE RapportLivraison SET idLivraison = :idl, idDepense = :idd, recette = :rec, difference = :diff WHERE id = :id");
            $q->bindValue(':idl',$this->idLivraison,PDO::PARAM_INT);
            $q->bindValue(':idd',$this->idDepense,PDO::PARAM_INT);
            $q->bindValue(':rec',$this->recette,PDO::PARAM_STR);
            $q->bindValue(':diff',$this->difference,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO RapportLivraison (idLivraison, idDepense, recette, difference) VALUES (:idl, :idd, :rec, :diff)");
        $q->bindValue(':idl',$this->idLivraison,PDO::PARAM_INT);
        $q->bindValue(':idd',$this->idDepense,PDO::PARAM_INT);
        $q->bindValue(':rec',$this->recette,PDO::PARAM_STR);
        $q->bindValue(':diff',$this->difference,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM RapportLivraison WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
