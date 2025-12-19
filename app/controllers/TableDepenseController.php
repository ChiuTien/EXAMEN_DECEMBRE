<?php

namespace app\controllers;

use Flight;
use app\modeles\TableDepense;

class TableDepenseController {
    public function listTableDepense() {
        $m = new TableDepense();
        $items = $m->getAll();
        Flight::render('../views/TableDepenseView.php', [
            'depenses' => $items
        ]);
    }

    public function viewTableDepense($id) {
        $m = new TableDepense();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Dépense non trouvée');
        Flight::render('tabledepense/view', [
            'depense' => $m,
            'depenseData' => $data
        ]);
    }

    public function createTableDepense($salChauffeur, $depCarburant, $depEntretien) {
        $m = new TableDepense();
        $m->setSalChauffeur($salChauffeur);
        $m->setDepCarburant($depCarburant);
        $m->setDepEntretien($depEntretien);
        $m->save();
        $this->listTableDepense();
    }

    public function deleteTableDepense($id) {
        $m = new TableDepense();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Dépense non trouvée');
        $m->delete();
        $this->listTableDepense();
    }
}

?>
