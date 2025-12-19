<?php

namespace app\controllers;

use Flight;
use app\modeles\Carburant;

class CarburantController {
    public function listCarburant() {
        $m = new Carburant();
        $items = $m->getAll();
        Flight::render('../views/CarburantView.php', [
            'carburants' => $items
        ]);
    }

    public function viewCarburant($id) {
        $m = new Carburant();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Carburant non trouvé');
        Flight::render('carburant/view', [
            'carburant' => $m,
            'carburantData' => $data
        ]);
    }

    public function createCarburant($val, $prix) {
        $m = new Carburant();
        $m->setVal($val);
        $m->setPrix($prix);
        $m->save();
        $this->listCarburant();
    }

    public function deleteCarburant($id) {
        $m = new Carburant();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Carburant non trouvé');
        $m->delete();
        $this->listCarburant();
    }
}

?>
