<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'FruitController::index',['as'=>'index']);
$routes->get('/create', 'FruitController::create',['as'=>'create']);
$routes->post('/store', 'FruitController::store',['as'=>'store']);
$routes->get('/edit/(:num)', 'FruitController::edit/$1',['as'=>'edit']);
$routes->post('/update/(:num)', 'FruitController::update/$1',['as'=>'update']);
$routes->post('/delete/(:num)', 'FruitController::delete/$1',['as'=>'delete']);
