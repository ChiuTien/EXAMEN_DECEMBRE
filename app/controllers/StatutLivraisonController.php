<?php

namespace app\controllers;

use Flight;
use app\modeles\StatutLivraison;

class StatutLivraisonController {
    public function listStatutLivraison() {
        $m = new StatutLivraison();
        $items = $m->getAll();
        Flight::render('../views/StatutLivraisonView.php', [
            'statutlivraisons' => $items
        ]);
    }

    public function viewStatutLivraison($id) {
        $m = new StatutLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'StatutLivraison non trouvé');
        Flight::render('statutlivraison/view', [
            'statutlivraison' => $m,
            'statutlivraisonData' => $data
        ]);
    }

    public function createStatutLivraison($idLivraison, $idStatut, $debut, $fin) {
        $m = new StatutLivraison();
        $m->setIdLivraison($idLivraison);
        $m->setIdStatut($idStatut);
        $m->setDebut($debut);
        $m->setFin($fin);
        $m->save();
        $this->listStatutLivraison();
    }

    public function deleteStatutLivraison($id) {
        $m = new StatutLivraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'StatutLivraison non trouvé');
        $m->delete();
        $this->listStatutLivraison();
    }
}

?>
