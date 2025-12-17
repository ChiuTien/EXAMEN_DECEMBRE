<?php 
    namespace app\controllers;

    use flight\Engine;
    use app\modeles\Produit;

    class ProduitController {
        //Attribut
        protected Engine $app;

        //Setter
        public function __construct($app) {
		    $this->app = $app;
	    }

        //Getter
        public function getApp() {
            return $this->app;
        }

        //Methods
        public static function getAllProduit() {
            $Produit = new Produit();
            $liste = $Produit->getAll();
            include __DIR__ . '../../views/welcome.php';
        }
        public static function getProduitById($id) {
            $Produit = new Produit();
            $prod = $Produit->getById($id);
            include __DIR__ . '../../views/produit.php';
        }
    }


?>