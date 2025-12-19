<?php

use app\controllers\VehiculeController;
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

}, [ SecurityHeadersMiddleware::class ]);