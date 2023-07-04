<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

 use App\Controllers\UserAuthentication;
 use App\Controllers\Home;
 use App\Controllers\Transaction;
 use App\Controllers\Categories;


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', [UserAuthentication::class, 'login']);

//Home/Dashboard
$routes->get("/dashboard", [Home::class, 'index']);

// User authentication
$routes->match(['get','post'], '/login', [UserAuthentication::class, 'login']);
$routes->match(['get','post'], '/signup', [UserAuthentication::class, 'signup']);
$routes->get('/signout', [UserAuthentication::class, 'signout']);
$routes->match(['get','post'],'/reset', [UserAuthentication::class, 'reset']);
$routes->match(['get','post'],'/reset/(:num)', [UserAuthentication::class, 'resetUser']);

// Transaction
$routes->get('/transaction', [Transaction::class, 'index']);
$routes->match(['get','post'],'/transaction/new', [Transaction::class, 'newTransaction']);

//Categories
$routes->match(['get','post'],'/category/new', [Categories::class, 'new']);


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
