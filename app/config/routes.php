<?php

use app\controllers\VehiculeController;
use app\controllers\LivreurController;
use app\controllers\BinomeController;
use app\controllers\CarburantController;
use app\controllers\ColisController;
use app\controllers\DestinationController;
use app\controllers\EntrepotController;
use app\controllers\EquivalenceController;
use app\controllers\LivraisonController;
use app\controllers\RapportLivraisonController;
use app\controllers\StatutController;
use app\controllers\StatutLivraisonController;
use app\controllers\TableDayController;
use app\controllers\TableDepenseController;
use app\controllers\TableMonthController;
use app\controllers\TableYearController;
use app\controllers\ZoneLivraisonController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

	$router->get('/', function() use ($app) {
		$app->render('welcome');
	});

	$router->get('/hello-world/@name', function($name) {
		echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
	});

	$router->group('/vehicules', function() use ($router) {
		$router->get('', [ VehiculeController::class, 'listVehicules' ]);
		$router->get('/@id:[0-9]+', [ VehiculeController::class, 'viewVehicule' ]);
	});

	// Routes pour autres modèles
	$router->group('/livreurs', function() use ($router) {
		$router->get('', [ LivreurController::class, 'listLivreur' ]);
		$router->get('/@id:[0-9]+', [ LivreurController::class, 'viewLivreur' ]);
	});

	$router->group('/binomes', function() use ($router) {
		$router->get('', [ BinomeController::class, 'listBinomes' ]);
		$router->get('/@id:[0-9]+', [ BinomeController::class, 'viewBinome' ]);
	});

	$router->group('/carburants', function() use ($router) {
		$router->get('', [ CarburantController::class, 'listCarburant' ]);
		$router->get('/@id:[0-9]+', [ CarburantController::class, 'viewCarburant' ]);
	});

	$router->group('/colis', function() use ($router) {
		$router->get('', [ ColisController::class, 'listColis' ]);
		$router->get('/@id:[0-9]+', [ ColisController::class, 'viewColis' ]);
	});

	$router->group('/destinations', function() use ($router) {
		$router->get('', [ DestinationController::class, 'listDestination' ]);
		$router->get('/@id:[0-9]+', [ DestinationController::class, 'viewDestination' ]);
	});

	$router->group('/entrepots', function() use ($router) {
		$router->get('', [ EntrepotController::class, 'listEntrepot' ]);
		$router->get('/@id:[0-9]+', [ EntrepotController::class, 'viewEntrepot' ]);
	});

	$router->group('/equivalences', function() use ($router) {
		$router->get('', [ EquivalenceController::class, 'listEquivalence' ]);
		$router->get('/@id:[0-9]+', [ EquivalenceController::class, 'viewEquivalence' ]);
	});

	$router->group('/livraisons', function() use ($router) {
		$router->get('', [ LivraisonController::class, 'listLivraison' ]);
		$router->get('/@id:[0-9]+', [ LivraisonController::class, 'viewLivraison' ]);
	});

	$router->group('/rapports', function() use ($router) {
		$router->get('', [ RapportLivraisonController::class, 'listRapportLivraison' ]);
		$router->get('/@id:[0-9]+', [ RapportLivraisonController::class, 'viewRapportLivraison' ]);
	});

	$router->group('/statuts', function() use ($router) {
		$router->get('', [ StatutController::class, 'listStatut' ]);
		$router->get('/@id:[0-9]+', [ StatutController::class, 'viewStatut' ]);
	});

	$router->group('/statutlivraisons', function() use ($router) {
		$router->get('', [ StatutLivraisonController::class, 'listStatutLivraison' ]);
		$router->get('/@id:[0-9]+', [ StatutLivraisonController::class, 'viewStatutLivraison' ]);
	});

	$router->group('/days', function() use ($router) {
		$router->get('', [ TableDayController::class, 'listTableDay' ]);
		$router->get('/@id:[0-9]+', [ TableDayController::class, 'viewTableDay' ]);
	});

	$router->group('/depenses', function() use ($router) {
		$router->get('', [ TableDepenseController::class, 'listTableDepense' ]);
		$router->get('/@id:[0-9]+', [ TableDepenseController::class, 'viewTableDepense' ]);
	});

	$router->group('/months', function() use ($router) {
		$router->get('', [ TableMonthController::class, 'listTableMonth' ]);
		$router->get('/@id:[0-9]+', [ TableMonthController::class, 'viewTableMonth' ]);
	});

	$router->group('/years', function() use ($router) {
		$router->get('', [ TableYearController::class, 'listTableYear' ]);
		$router->get('/@id:[0-9]+', [ TableYearController::class, 'viewTableYear' ]);
	});

	$router->group('/zones', function() use ($router) {
		$router->get('', [ ZoneLivraisonController::class, 'listZoneLivraison' ]);
		$router->get('/@id:[0-9]+', [ ZoneLivraisonController::class, 'viewZoneLivraison' ]);
	});

}, [ SecurityHeadersMiddleware::class ]);