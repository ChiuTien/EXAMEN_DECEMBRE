<?php

namespace app\controllers;

use Flight;
use app\modeles\Equivalence;

class EquivalenceController {
    public function listEquivalence() {
        $m = new Equivalence();
        $items = $m->getAll();
        Flight::render('../views/EquivalenceView.php', [
            'equivalences' => $items
        ]);
    }

    public function viewEquivalence($id) {
        $m = new Equivalence();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Equivalence non trouvée');
        Flight::render('equivalence/view', [
            'equivalence' => $m,
            'equivalenceData' => $data
        ]);
    }

    public function createEquivalence($pMin, $pMax, $prix) {
        $m = new Equivalence();
        $m->setPMin($pMin);
        $m->setPMax($pMax);
        $m->setPrix($prix);
        $m->save();
        $this->listEquivalence();
    }

    public function deleteEquivalence($id) {
        $m = new Equivalence();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Equivalence non trouvée');
        $m->delete();
        $this->listEquivalence();
    }
}

?>
