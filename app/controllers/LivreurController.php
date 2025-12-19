<?php 

namespace app\controllers;

use app\modeles\Livreur;
use Flight;

class LivreurController {
    //Liste des livreur
    public function listLivreur() {
        // Créer une instance pour appeler getAll()
        $livreurModel = new Livreur();
        
        // getAll() retourne un tableau associatif
        $livreur = $livreurModel->getAll();
        
        // Passer à la vue
        Flight::render('../views/LivreurView.php', [
            'livreur' => $livreur
        ]);
    }

    //Voir un livreur
    public function viewLivreur($id) {
        $livreurModel = new Livreur();
        
        // getById() remplit l'instance et retourne les données
        $data = $livreurModel->getById($id);
        
        if (!$data) {
            Flight::halt(404, 'Livreur non trouvé');
        }
        
        // Passer à la fois l'instance ET les données
        Flight::render('livreur/view', [
            'livreur' => $livreurModel,  // Instance avec getters
            'livreurData' => $data        // Données brutes
        ]);
    }

    //Creation Livreur
    public function createLivreur($nom) {
        $livreurModel = new Livreur();

        $livreurModel->setNom($nom);
        $livreurModel->save();

        $this->listLivreur();
    }

    // Suppression Livreur
    public function deleteLivreur($id) {
        $livreurModel = new Livreur();
        $data = $livreurModel->getById($id);
        if (!$data) {
            Flight::halt(404, 'Livreur non trouvé');
        }
        $livreurModel->delete();
        $this->listLivreur();
    }

}

?>