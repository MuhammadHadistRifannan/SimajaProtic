<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('login', '\Myth\Auth\Controllers\LoginController::login');
// $routes->post('login', '\Myth\Auth\Controllers\LoginController::attemptLogin');

$routes->get('/', 'Pages::index');
$routes->get('/pages', 'Pages::index');
$routes->get('/jadwal', 'Page::jadwal');
$routes->get('/materi', 'Page::materi');
$routes->get('/progres', 'Page::progres');
$routes->get('/peringkat', 'Page::peringkat');
$routes->get('/profile', 'Page::profile');
$routes->get('/absensi', 'Page::absensi');       
$routes->post('/absensi/kirim', 'Page::kirimAbsensi');
$routes->get('logout', 'AuthController::logout');

$routes->get('/search', 'Page::search');



