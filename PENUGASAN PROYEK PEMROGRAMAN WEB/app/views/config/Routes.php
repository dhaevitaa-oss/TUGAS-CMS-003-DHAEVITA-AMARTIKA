
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/create', 'Laporan::create');
$routes->post('laporan/store', 'Laporan::store');

$routes->get('laporan/edit/(:num)', 'Laporan::edit/$1');
$routes->post('laporan/update/(:num)', 'Laporan::update/$1');

$routes->post('laporan/selesai/(:num)', 'Laporan::selesai/$1');
$routes->post('laporan/hapus/(:num)', 'Laporan::hapus/$1');

$routes->get('laporan/riwayat', 'Laporan::riwayat');

$routes->get('cari-barang', 'Laporan::cari');
