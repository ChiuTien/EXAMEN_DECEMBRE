<?php

namespace app\controllers;

use Flight;
use app\modeles\TableYear;

class TableYearController {
    public function listTableYear() {
        $m = new TableYear();
        $items = $m->getAll();
        Flight::render('../views/TableYearView.php', [
            'years' => $items
        ]);
    }

    public function viewTableYear($id) {
        $m = new TableYear();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Année non trouvée');
        Flight::render('tableyear/view', [
            'year' => $m,
            'yearData' => $data
        ]);
    }

    public function createTableYear($val) {
        $m = new TableYear();
        $m->setVal($val);
        $m->save();
        $this->listTableYear();
    }

    public function deleteTableYear($id) {
        $m = new TableYear();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Année non trouvée');
        $m->delete();
        $this->listTableYear();
    }
}

?>
