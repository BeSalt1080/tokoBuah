<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'FruitController::index',['as'=>'index']);
$routes->get('/create', 'FruitController::create',['as'=>'create']);
$routes->post('/store', 'FruitController::store',['as'=>'store']);
$routes->get('/edit/(:any)', 'FruitController::edit',['as'=>'edit']);
$routes->post('/update/(:any)', 'FruitController::update/$1',['as'=>'update']);
$routes->post('/delete/(:any)', 'FruitController::delete/$1',['as'=>'delete']);
