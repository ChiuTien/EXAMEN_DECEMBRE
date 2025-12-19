<?php 

namespace app\controllers;
use app\modeles\Vehicule;

class VehiculeController {
    //Liste des vehicules
    public function listVehicules() {
        // Créer une instance pour appeler getAll()
        $vehiculeModel = new Vehicule();
        
        // getAll() retourne un tableau associatif
        $vehicules = $vehiculeModel->getAll();
        
        // Passer à la vue
        Flight::render('../views/VehiculeView.php', [
            'vehicules' => $vehicules
        ]);
    }

    //Voir un vehicule
    public function viewVehicule($id) {
        $vehiculeModel = new Vehicule();
        
        // getById() remplit l'instance et retourne les données
        $data = $vehiculeModel->getById($id);
        
        if (!$data) {
            Flight::halt(404, 'Véhicule non trouvé');
        }
        
        // Passer à la fois l'instance ET les données
        Flight::render('vehicule/view', [
            'vehicule' => $vehiculeModel,  // Instance avec getters
            'vehiculeData' => $data        // Données brutes
        ]);
    }
}
?>