<?php 

namespace app\controllers;

use Flight;
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

    //Creation Vehicule
    public function createVehicule($matricule, $idCarburant) {
        $vehiculeModel = new Vehicule();

        $vehiculeModel->setMatricule($matricule);
        $vehiculeModel->setIdCarburant($idCarburant);

        $vehiculeModel->save();

        $this->listVehicules();
    }

    // Suppression Vehicule
    public function deleteVehicule($id) {
        $vehiculeModel = new Vehicule();
        $data = $vehiculeModel->getById($id);
        if (!$data) {
            Flight::halt(404, 'Véhicule non trouvé');
        }
        $vehiculeModel->delete();
        $this->listVehicules();
    }
}
?>