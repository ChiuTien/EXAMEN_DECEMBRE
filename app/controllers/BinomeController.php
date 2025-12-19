<?php

namespace app\controllers;

use Flight;
use app\modeles\Binome;

class BinomeController {
    public function listBinomes() {
        $m = new Binome();
        $items = $m->getAll();
        Flight::render('../views/BinomeView.php', [
            'binomes' => $items
        ]);
    }

    public function viewBinome($id) {
        $m = new Binome();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Binome non trouvé');
        Flight::render('binome/view', [
            'binome' => $m,
            'binomeData' => $data
        ]);
    }

    public function createBinome($idLivreur, $idVehicule) {
        $m = new Binome();
        $m->setIdLivreur($idLivreur);
        $m->setIdVehicule($idVehicule);
        $m->save();
        $this->listBinomes();
    }

    public function deleteBinome($id) {
        $m = new Binome();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Binome non trouvé');
        $m->delete();
        $this->listBinomes();
    }
}

?>
