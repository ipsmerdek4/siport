<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/views/a', 'Home::views_a');
$routes->get('/views/b', 'Home::views_b'); 
$routes->post('/views/k', 'Home::Vw'); 

$routes->post('/departure/k', 'Home::departure_k'); 
$routes->get('/paymen/p/(:any)', 'Home::paymen_p/$1'); 
$routes->post('/checkout', 'Home::paymen_checkout'); 
$routes->post('/checkout/request', 'Home::paymen_checkout_req'); 

$routes->post('/trans/k', 'Home::pembayaran_k'); 
$routes->post('/trans/kv', 'Home::pembayaran_kV'); 



$routes->get('/myorder', 'Order::index');  
$routes->post('/myorder/list', 'Order::list');


$routes->get('/views/z/(:any)', 'Home::views_z/$1');

$routes->get('/visit/(:any)', 'Visit::index/$1');

$routes->get('/login', 'Login::index');
$routes->post('/slog', 'Login::progres_login');

$routes->get('/register', 'Register::index');
$routes->post('/regto', 'Register::progres_regis');

$routes->get('/logout', 'Login::logout');

$routes->get('/destination', 'Destination::index');
$routes->post('/destination/list', 'Destination::list');

$routes->get('/destination/insert', 'Destination::insert');
$routes->post('/destination/insert/p', 'Destination::inp_progress');

$routes->get('/destination/delete/(:any)', 'Destination::delete/$1');

$routes->get('/destination/update/(:any)', 'Destination::update/$1'); 
$routes->post('/destination/update/p/(:any)', 'Destination::up_progress/$1'); 


$routes->get('/vehicle', 'Vehicle::index'); 
$routes->post('/vehicle/list', 'Vehicle::list');
 
$routes->get('/vehicle/insert', 'Vehicle::insert'); 
$routes->post('/vehicle/insert/p', 'Vehicle::inp_progress');

$routes->get('/vehicle/delete/(:any)', 'Vehicle::delete/$1');

$routes->get('/vehicle/update/(:any)', 'Vehicle::update/$1'); 
$routes->post('/vehicle/update/p/(:any)', 'Vehicle::up_progress/$1'); 
 

$routes->get('/driver', 'Driver::index'); 
$routes->post('/driver/list', 'Driver::list');
 
$routes->get('/driver/insert', 'Driver::insert'); 
$routes->post('/driver/insert/p', 'Driver::inp_progress');

$routes->get('/driver/delete/(:any)', 'Driver::delete/$1');

$routes->get('/driver/update/(:any)', 'Driver::update/$1'); 
$routes->post('/driver/update/p/(:any)', 'Driver::up_progress/$1'); 

 
 

$routes->get('/departure', 'Departure::index'); 
$routes->post('/departure/list', 'Departure::list');
 
$routes->get('/departure/insert', 'Departure::insert'); 
$routes->get('/departure/insert/a', 'Departure::serchone'); 
$routes->get('/departure/insert/b', 'Departure::serchtwo'); 
$routes->get('/departure/insert/c', 'Departure::serchtree'); 


$routes->post('/departure/insert/p', 'Departure::inp_progress');

$routes->get('/departure/delete/(:any)', 'Departure::delete/$1');

$routes->get('/departure/update/(:any)', 'Departure::update/$1'); 
$routes->post('/departure/update/p/(:any)', 'Departure::up_progress/$1'); 

 
 

 
 

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
