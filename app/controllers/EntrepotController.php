<?php

namespace app\controllers;

use Flight;
use app\modeles\Entrepot;

class EntrepotController {
    public function listEntrepot() {
        $m = new Entrepot();
        $items = $m->getAll();
        Flight::render('../views/EntrepotView.php', [
            'entrepots' => $items
        ]);
    }

    public function viewEntrepot($id) {
        $m = new Entrepot();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Entrepôt non trouvé');
        Flight::render('entrepot/view', [
            'entrepot' => $m,
            'entrepotData' => $data
        ]);
    }

    public function createEntrepot($addresse) {
        $m = new Entrepot();
        $m->setAddresse($addresse);
        $m->save();
        $this->listEntrepot();
    }

    public function deleteEntrepot($id) {
        $m = new Entrepot();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Entrepôt non trouvé');
        $m->delete();
        $this->listEntrepot();
    }
}

?>
