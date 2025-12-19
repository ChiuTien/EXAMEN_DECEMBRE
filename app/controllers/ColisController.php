<?php

namespace app\controllers;

use Flight;
use app\modeles\Colis;

class ColisController {
    public function listColis() {
        $m = new Colis();
        $items = $m->getAll();
        Flight::render('../views/ColisView.php', [
            'colis' => $items
        ]);
    }

    public function viewColis($id) {
        $m = new Colis();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Colis non trouvé');
        Flight::render('colis/view', [
            'colis' => $m,
            'colisData' => $data
        ]);
    }

    public function createColis($val, $img, $poids) {
        $m = new Colis();
        $m->setVal($val);
        $m->setImg($img);
        $m->setPoids($poids);
        $m->save();
        $this->listColis();
    }

    public function deleteColis($id) {
        $m = new Colis();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Colis non trouvé');
        $m->delete();
        $this->listColis();
    }
}

?>
