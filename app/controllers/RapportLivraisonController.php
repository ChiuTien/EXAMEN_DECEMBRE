<?php

namespace app\controllers;

use Flight;
use app\modeles\RapportLivraison;

class RapportLivraisonController {
    public function listRapportLivraison() {
        $m = new RapportLivraison();
        $items = $m->getAll();
        Flight::render('../views/RapportLivraisonView.php', [
            'rapports' => $items
        ]);
    }

    public function viewRapportLivraison($id) {
        $m = new RapportLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Rapport non trouvé');
        Flight::render('rapportlivraison/view', [
            'rapport' => $m,
            'rapportData' => $data
        ]);
    }

    public function createRapportLivraison($idLivraison, $idDepense, $recette, $difference) {
        $m = new RapportLivraison();
        $m->setIdLivraison($idLivraison);
        $m->setIdDepense($idDepense);
        $m->setRecette($recette);
        $m->setDifference($difference);
        $m->save();
        $this->listRapportLivraison();
    }

    public function deleteRapportLivraison($id) {
        $m = new RapportLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Rapport non trouvé');
        $m->delete();
        $this->listRapportLivraison();
    }
}

?>
