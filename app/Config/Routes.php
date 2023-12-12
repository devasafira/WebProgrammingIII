<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //------------------ USER ROUTES ------------------

 // USER MAIN ROUTES
$routes->get('/', 'UserController::index');
$routes->get('/home', 'UserController::index');
$routes->get('/contact', 'UserController::contact');
$routes->get('/menu', 'UserController::menu');
$routes->get('/cart', 'CartController::index');
$routes->get('/logoutUserTable/(:num)', 'CartController::logout/$1');

// User Table
$routes->get('/TableAuthentification/(:num)', 'TableAuth::TableLogin/$1');
$routes->post('/tableLogin', 'TableAuth::Login');
// $routes->get('/logoutUserTable', 'TableAuth::logout');

$routes->get('/statusPesanan', 'UserController::statusPesanan');

// User Cart
$routes->group('cart', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('add/(:num)/(:num)', 'CartController::addToCart/$1/$2', ['as' => 'addToCart']);
    $routes->post('processOrder', 'CartController::processOrder', ['as' => 'processOrder']);
});

<<<<<<< Updated upstream
=======
$routes->get('/pilihMeja', 'TableController::pilihmeja');
$routes->post('/pilihmeja', 'TableController::placeOrder');

// pilihmenu
// $routes->get('/pilihmenu', 'User::menu');
$routes->get('/pilihmenu', 'MenuController::pilihmenu');
$routes->get('/pesan', 'MenuController::tesmenu');
>>>>>>> Stashed changes

//------------------ ADMIN ROUTES ------------------

// ADMIN MAIN
$routes->get('/admin', 'PesananController::index');
$routes->get('/pesananAdmin', 'PesananController::index');
$routes->get('/menuAdmin', 'MenuController::index');
$routes->get('/tableAdmin', 'TableController::index');
$routes->get('/riwayatPesananAdmin', 'RiwPemController::index');

//ADMIN PESANAN
$routes->get('/selesaikanPesanan/(:num)', 'PesananController::pesananSelesai/$1');

// ADMIN LAPORAN
$routes->get('/laporan', 'LaporanController::index');
$routes->post('/laporan', 'LaporanController::filterLaporan');
$routes->get('/laporan/laporanharian', 'LaporanController::laporanHarian');
$routes->post('/laporan/filterLaporan', 'LaporanController::filterLaporan');
$routes->post('/laporan/printpdf', 'LaporanController::printpdf');
$routes->post('/laporan/print', 'LaporanController::print');
$routes->post('/laporan/excel', 'LaporanController::ExportExcel');

// ADMIN MENU 
$routes->get('/tambahMenu', 'MenuController::tambahMenu');
$routes->post('/saveMenu', 'MenuController::saveMenu');
$routes->delete('/deleteMenu/(:num)', 'MenuController::delete/$1');
$routes->get('/editMenu/(:num)', 'MenuController::edit/$1');
$routes->post('/updateMenu/(:num)', 'MenuController::updateMenu/$1');

// ADMIN TABLE
$routes->get('/tambahTable', 'TableController::tambahTable');
$routes->post('/saveTable', 'TableController::saveTable');
$routes->delete('/deleteTable/(:num)', 'TableController::delete/$1');
$routes->get('/editTable/(:num)', 'TableController::edit/$1');
$routes->post('/updateTable/(:num)', 'TableController::updateTable/$1');
// $routes->get('/deactivateTable/(:num)', 'TableController::deactivateTable/$1'); //diganti menjadi logout Table
$routes->get('/logoutTable/(:num)', 'TableController::Logout/$1');






