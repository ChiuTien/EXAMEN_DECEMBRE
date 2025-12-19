<?php

namespace app\controllers;

use Flight;
use app\modeles\Statut;

class StatutController {
    public function listStatut() {
        $m = new Statut();
        $items = $m->getAll();
        Flight::render('../views/StatutView.php', [
            'statuts' => $items
        ]);
    }

    public function viewStatut($id) {
        $m = new Statut();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Statut non trouvé');
        Flight::render('statut/view', [
            'statut' => $m,
            'statutData' => $data
        ]);
    }

    public function createStatut($val) {
        $m = new Statut();
        $m->setVal($val);
        $m->save();
        $this->listStatut();
    }

    public function deleteStatut($id) {
        $m = new Statut();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Statut non trouvé');
        $m->delete();
        $this->listStatut();
    }
}

?>
