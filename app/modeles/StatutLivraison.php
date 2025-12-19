<?php
namespace app\modeles;

use PDO;

class StatutLivraison extends Model {
    private $id;
    private $idLivraison;
    private $idStatut;
    private $debut;
    private $fin;

    public function setId($i) { $this->id = (int)$i; }
    public function setIdLivraison($l) { $this->idLivraison = (int)$l; }
    public function setIdStatut($s) { $this->idStatut = (int)$s; }
    public function setDebut($d) { $this->debut = $d; }
    public function setFin($f) { $this->fin = $f; }
    public function getId() { return $this->id; }
    public function getIdLivraison() { return $this->idLivraison; }
    public function getIdStatut() { return $this->idStatut; }
    public function getDebut() { return $this->debut; }
    public function getFin() { return $this->fin; }

    public function getAll() {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM StatutLivraison");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $DB = parent::db();
        $q = $DB->prepare("SELECT * FROM StatutLivraison WHERE id = :id");
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->setId($row['id']);
            $this->setIdLivraison($row['idLivraison'] ?? $row['id_livraison'] ?? null);
            $this->setIdStatut($row['idStatut'] ?? $row['id_statut'] ?? null);
            $this->setDebut($row['debut']);
            $this->setFin($row['fin'] ?? null);
        }
        return $row;
    }

    public function save() {
        $DB = parent::db();
        if(!empty($this->id)) {
            $q = $DB->prepare("UPDATE StatutLivraison SET idLivraison = :idl, idStatut = :ids, debut = :deb, fin = :fin WHERE id = :id");
            $q->bindValue(':idl',$this->idLivraison,PDO::PARAM_INT);
            $q->bindValue(':ids',$this->idStatut,PDO::PARAM_INT);
            $q->bindValue(':deb',$this->debut,PDO::PARAM_STR);
            $q->bindValue(':fin',$this->fin,PDO::PARAM_STR);
            $q->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $q->execute();
        }
        $q = $DB->prepare("INSERT INTO StatutLivraison (idLivraison, idStatut, debut, fin) VALUES (:idl, :ids, :deb, :fin)");
        $q->bindValue(':idl',$this->idLivraison,PDO::PARAM_INT);
        $q->bindValue(':ids',$this->idStatut,PDO::PARAM_INT);
        $q->bindValue(':deb',$this->debut,PDO::PARAM_STR);
        $q->bindValue(':fin',$this->fin,PDO::PARAM_STR);
        $res = $q->execute();
        if($res) $this->id = $DB->lastInsertId();
        return $res;
    }

    public function delete() {
        if(empty($this->id)) return false;
        $DB = parent::db();
        $q = $DB->prepare("DELETE FROM StatutLivraison WHERE id = :id");
        $q->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $q->execute();
    }
}

?>
