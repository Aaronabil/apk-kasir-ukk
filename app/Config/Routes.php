<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Login::index');
$routes->get('/', 'Beranda::index');

$routes->get('/register', 'Register::index');

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/create', 'Produk::tambah');
$routes->post('/produk/save', 'Produk::simpan');
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('/produk/update/(:num)', 'Produk::update/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');

$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/create', 'Pelanggan::tambah');
$routes->post('/pelanggan/save', 'Pelanggan::simpan');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:num)', 'Pelanggan::update/$1');
$routes->delete('/pelanggan/(:num)', 'Pelanggan::delete/$1');

$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'role:admin']);
$routes->get('/pengguna/create', 'Pengguna::tambah', ['filter' => 'role:admin']);
$routes->post('/pengguna/save', 'Pengguna::simpan', ['filter' => 'role:admin']);
$routes->get('/pengguna/edit/(:num)', 'Pengguna::edit/$1', ['filter' => 'role:admin']);
$routes->post('/pengguna/update/(:num)', 'Pengguna::update/$1', ['filter' => 'role:admin']);
$routes->delete('/pengguna/(:num)', 'Pengguna::delete/$1', ['filter' => 'role:admin']);

$routes->get('/penjualan', 'Penjualan::index');
$routes->post('/penjualan', 'Penjualan::simpan');
$routes->delete('/penjualan/(:num)', 'Penjualan::delete/$1');

//$routes->get('/beranda', 'Beranda::index');
