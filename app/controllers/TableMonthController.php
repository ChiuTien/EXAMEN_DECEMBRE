<?php

namespace app\controllers;

use Flight;
use app\modeles\TableMonth;

class TableMonthController {
    public function listTableMonth() {
        $m = new TableMonth();
        $items = $m->getAll();
        Flight::render('../views/TableMonthView.php', [
            'months' => $items
        ]);
    }

    public function viewTableMonth($id) {
        $m = new TableMonth();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Mois non trouvé');
        Flight::render('tablemonth/view', [
            'month' => $m,
            'monthData' => $data
        ]);
    }

    public function createTableMonth($val, $idYear) {
        $m = new TableMonth();
        $m->setVal($val);
        $m->setIdYear($idYear);
        $m->save();
        $this->listTableMonth();
    }

    public function deleteTableMonth($id) {
        $m = new TableMonth();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Mois non trouvé');
        $m->delete();
        $this->listTableMonth();
    }
}

?>
