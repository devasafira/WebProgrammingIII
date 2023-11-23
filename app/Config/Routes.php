<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/contact', 'HomeController::contact');
$routes->get('/menu', 'HomeController::index');

// admin
$routes->get('/admin', 'AdminController::index');
$routes->get('/pesananAdmin', 'AdminController::index');
$routes->get('/menuAdmin', 'MenuController::index');
$routes->get('/tableAdmin', 'TableController::index');
$routes->get('/tableAdmin', 'TableController::index');

// admin Menu 
$routes->get('/tambahMenu', 'MenuController::tambahMenu');
$routes->post('/saveMenu', 'MenuController::saveMenu');
$routes->delete('/deleteMenu/(:num)', 'MenuController::delete/$1');
$routes->get('/editMenu/(:num)', 'MenuController::edit/$1');
$routes->post('/updateMenu/(:num)', 'MenuController::updateMenu/$1');

// qrcode 
$routes->group('tableAuth', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('generate-qr-code', 'TableAuth::generateQRCode');
    $routes->post('verify-qr-code', 'TableAuth::verifyQRCode');
});



