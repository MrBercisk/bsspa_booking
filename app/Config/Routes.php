<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->get('/', 'Home::index');

$routes->group('api', ['filter' => 'cors'], function ($routes) {
    /* Dashboard API */
    $routes->get('dashboard', 'dashboard::index');
    /* End */

    /* Massage API */
    $routes->post('massage', 'massage::create');
    $routes->put('massage(:segment)', 'Massage::update/$1');
    $routes->get('massage/(:segment)', 'Massage::show/$1');
    $routes->delete('massage/(:segment)', 'massage::delete/$1');
    /* End  */

    /*Daftar API  */
    $routes->resource('daftar');
    /* End */

    /* Login API */
    $routes->get('login', 'Login::index');
    $routes->post('login', 'login::create');
    $routes->get('login', 'Login::logout');
    /* End */

    /* User API */
    $routes->post('user', 'user::create');
    $routes->get('user/(:segment)', 'user::show/$1');
    $routes->put('user/(:segment)', 'user::update/$1');
    $routes->delete('user/(:segment)', 'user::delete/$1');
    /* End */
    $routes->get('booking', 'booking::index');
    $routes->post('booking', 'booking::create');
    $routes->get('booking', 'booking::show/$1');
    $routes->put('booking(:segment)', 'booking::update/$1');

    /* Terapis API */
    $routes->post('terapis', 'terapis::create');
    $routes->get('terapis/(:segment)', 'terapis::show/$1');
    $routes->delete('terapis/(:segment)', 'terapis::delete/$1');
    /* End */

    /* Transaksi API */
    $routes->post('transaksi', 'transaksi::create');
    $routes->get('transaksi/(:segment)', 'transaksi::show/$1');
    $routes->put('transaksi(:segment)', 'transaksi::update/$1');
    /* End */

    /* Laporan API */
    $routes->post('laporan', 'laporan::create');
    $routes->get('laporan/(:segment)', 'laporan::show/$1');
    $routes->put('laporan(:segment)', 'laporan::update/$1');
    /* End */

    /* Member API */
    $routes->post('updatePassword', 'Member::updatePassword');
    
    
    $routes->post('forgotPassword', 'ForgotPassword::create');
    /* End */
});
$routes->options('(:any)', 'Preflight::options');
