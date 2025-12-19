<?php

namespace app\controllers;

use Flight;
use app\modeles\TableDay;

class TableDayController {
    public function listTableDay() {
        $m = new TableDay();
        $items = $m->getAll();
        Flight::render('../views/TableDayView.php', [
            'days' => $items
        ]);
    }

    public function viewTableDay($id) {
        $m = new TableDay();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Jour non trouvé');
        Flight::render('tableday/view', [
            'day' => $m,
            'dayData' => $data
        ]);
    }

    public function createTableDay($jour, $idMonth) {
        $m = new TableDay();
        $m->setJour($jour);
        $m->setIdMonth($idMonth);
        $m->save();
        $this->listTableDay();
    }

    public function deleteTableDay($id) {
        $m = new TableDay();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Jour non trouvé');
        $m->delete();
        $this->listTableDay();
    }
}

?>
