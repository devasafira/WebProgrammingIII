<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::index');
$routes->get('/home', 'UserController::index');
$routes->get('/contact', 'UserController::contact');
$routes->get('/menu', 'UserController::menu');

// Admin Main
$routes->get('/admin', 'AdminController::index');
$routes->get('/pesananAdmin', 'PesananController::index');
$routes->get('/menuAdmin', 'MenuController::index');
$routes->get('/tableAdmin', 'TableController::index');

// Admin Menu 
$routes->get('/tambahMenu', 'MenuController::tambahMenu');
$routes->post('/saveMenu', 'MenuController::saveMenu');
$routes->delete('/deleteMenu/(:num)', 'MenuController::delete/$1');
$routes->get('/editMenu/(:num)', 'MenuController::edit/$1');
$routes->post('/updateMenu/(:num)', 'MenuController::updateMenu/$1');

// Admin Table
$routes->get('/tambahTable', 'TableController::tambahTable');
$routes->post('/saveTable', 'TableController::saveTable');
$routes->delete('/deleteTable/(:num)', 'TableController::delete/$1');
$routes->get('/editTable/(:num)', 'TableController::edit/$1');
$routes->post('/updateTable/(:num)', 'TableController::updateTable/$1');
$routes->get('/deactivateTable/(:num)', 'TableController::deactivateTable/$1');



// qrcode (Gak dipake!)
$routes->group('tableAuth', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('generate-qr-code', 'TableAuth::generateQRCode');
    $routes->post('verify-qr-code', 'TableAuth::verifyQRCode');
});



