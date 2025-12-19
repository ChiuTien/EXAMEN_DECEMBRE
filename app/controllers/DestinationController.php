<?php

namespace app\controllers;

use Flight;
use app\modeles\Destination;

class DestinationController {
    public function listDestination() {
        $m = new Destination();
        $items = $m->getAll();
        Flight::render('../views/DestinationView.php', [
            'destinations' => $items
        ]);
    }

    public function viewDestination($id) {
        $m = new Destination();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Destination non trouvée');
        Flight::render('destination/view', [
            'destination' => $m,
            'destinationData' => $data
        ]);
    }

    public function createDestination($addresse) {
        $m = new Destination();
        $m->setAddresse($addresse);
        $m->save();
        $this->listDestination();
    }

    public function deleteDestination($id) {
        $m = new Destination();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Destination non trouvée');
        $m->delete();
        $this->listDestination();
    }
}

?>
