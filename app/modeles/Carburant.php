<?php 
    namespace app\modeles;

    use Flight;
    use PDO;

    class Carburant extends Model {
        // Attributs
        private $id;
        private $val;
        private $prix;

        // Setters
        public function setId($i) { $this->id = (int)$i; }
        public function setVal($v) { $this->val = $v; }
        public function setPrix($p) { $this->prix = $p; }

        // Getters
        public function getId() { return $this->id; }
        public function getVal() { return $this->val; }
        public function getPrix() { return $this->prix; }

        // Methods
        public function getAll() {
            $DB = parent::db();
            $query = $DB->prepare("SELECT * FROM Carburant");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $DB = parent::db();
            $query = $DB->prepare("SELECT * FROM Carburant WHERE id = :id");
            $query->bindValue(':id',$id,PDO::PARAM_INT);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            if($row) {
                $this->setId($row['id']);
                $this->setVal($row['val']);
                $this->setPrix($row['prix']);
            }
            return $row;
        }

        public function save() {
            $DB = parent::db();
            if(!empty($this->id)) {
                $query = $DB->prepare("UPDATE Carburant SET val = :val, prix = :prix WHERE id = :id");
                $query->bindValue(':val',$this->val,PDO::PARAM_STR);
                $query->bindValue(':prix',$this->prix,PDO::PARAM_STR);
                $query->bindValue(':id',$this->id,PDO::PARAM_INT);
                return $query->execute();
            } else {
                $query = $DB->prepare("INSERT INTO Carburant (val, prix) VALUES (:val, :prix)");
                $query->bindValue(':val',$this->val,PDO::PARAM_STR);
                $query->bindValue(':prix',$this->prix,PDO::PARAM_STR);
                $res = $query->execute();
                if($res) {
                    $this->id = $DB->lastInsertId();
                }
                return $res;
            }
        }

        public function delete() {
            if(empty($this->id)) return false;
            $DB = parent::db();
            $query = $DB->prepare("DELETE FROM Carburant WHERE id = :id");
            $query->bindValue(':id',$this->id,PDO::PARAM_INT);
            return $query->execute();
        }
    }
?>