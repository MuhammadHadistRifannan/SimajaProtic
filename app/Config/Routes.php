<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. HALAMAN UTAMA (HOME)
$routes->get('/', 'Page::index');

$routes->group('', ['filter' => 'login'], function ($routes) {

  // 2. FITUR JADWAL & PENDAFTARAN
  $routes->get('/jadwal', 'Page::jadwal');
  $routes->post('/jadwal/daftar/(:num)', 'Page::daftar/$1');
  $routes->get('/jadwal/rekap/(:num)', 'Page::rekap/$1');
  // 3. FITUR ABSENSI
  $routes->get('/absensi', 'Page::absensi');
  $routes->get('/absensi/(:num)', 'Page::absensi/$1');
  $routes->post('/absensi/kirim', 'Page::kirimAbsensi');

  // 4. FITUR MATERI & PROGRESS (LMS)
  $routes->get('/materi', 'Page::materi');
  $routes->get('/materi/detail/(:num)', 'Page::detailMateri/$1');
  $routes->get('/materi/belajar/(:num)', 'Page::belajar/$1');
  $routes->post('/materi/complete', 'Page::markComplete');

  // 5. FITUR QUIZ
  $routes->get('/quiz', 'Page::quiz');
  $routes->get('/quiz/pertemuan/(:num)', 'Page::mulaiQuiz/$1');
  $routes->post('/quiz/submit', 'Page::submitQuiz');

  // 6. FITUR PROFILE
  $routes->get('/profile', 'Page::profile');
  $routes->get('/profile/edit', 'Page::editProfile');
  $routes->post('/profile/update', 'Page::updateProfile');

  // 7. FITUR LAINNYA
  $routes->get('/progres', 'Page::progres');
  $routes->get('/peringkat', 'Page::peringkat');
  $routes->get('/search', 'Page::search');
});




// 8. UTILITY & AUTH
$routes->get('/reset-db', 'Page::resetProgress'); // Reset jika progress error
$routes->get('/logout', "\Myth\Auth\Controllers\AuthController::logout");