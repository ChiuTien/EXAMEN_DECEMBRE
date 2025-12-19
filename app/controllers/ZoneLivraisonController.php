<?php

namespace app\controllers;

use Flight;
use app\modeles\ZoneLivraison;

class ZoneLivraisonController {
    public function listZoneLivraison() {
        $m = new ZoneLivraison();
        $items = $m->getAll();
        Flight::render('../views/ZoneLivraisonView.php', [
            'zones' => $items
        ]);
    }

    public function viewZoneLivraison($id) {
        $m = new ZoneLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Zone non trouvée');
        Flight::render('zonelivraison/view', [
            'zone' => $m,
            'zoneData' => $data
        ]);
    }

    public function createZoneLivraison($idEntrepot, $idDestination, $distance) {
        $m = new ZoneLivraison();
        $m->setIdEntrepot($idEntrepot);
        $m->setIdDestination($idDestination);
        $m->setDistance($distance);
        $m->save();
        $this->listZoneLivraison();
    }

    public function deleteZoneLivraison($id) {
        $m = new ZoneLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Zone non trouvée');
        $m->delete();
        $this->listZoneLivraison();
    }
}

?>
