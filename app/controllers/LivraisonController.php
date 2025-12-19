<?php

namespace app\controllers;

use Flight;
use app\modeles\Livraison;

class LivraisonController {
    public function listLivraison() {
        $m = new Livraison();
        $items = $m->getAll();
        Flight::render('../views/LivraisonView.php', [
            'livraisons' => $items
        ]);
    }

    public function viewLivraison($id) {
        $m = new Livraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Livraison non trouvée');
        Flight::render('livraison/view', [
            'livraison' => $m,
            'livraisonData' => $data
        ]);
    }

    public function createLivraison($idBinome, $idDay, $idZone, $idColis) {
        $m = new Livraison();
        $m->setIdBinome($idBinome);
        $m->setIdDay($idDay);
        $m->setIdZone($idZone);
        $m->setIdColis($idColis);
        $m->save();
        $this->listLivraison();
    }

    public function deleteLivraison($id) {
        $m = new Livraison();
        $data = $m->getById($id);
        if (!$data) Flight::halt(404, 'Livraison non trouvée');
        $m->delete();
        $this->listLivraison();
    }
}

?>
