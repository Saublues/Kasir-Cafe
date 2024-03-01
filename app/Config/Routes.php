<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//  routes buat user
$routes->get('/', 'Home::Index');
$routes->get('/user', 'UserController::index');
$routes->post('/user/login', 'UserController::login');
$routes->get('/user/logout', 'UserController::logout');
$routes->get('/user/dashboard', 'Dashboard::index', ['filter' => 'otentifikasi']);
$routes->get('/user/tampil', 'UserController::tampilUser');
$routes->get('/user/tambah', 'UserController::tambahUser');
$routes->post('/user/simpan', 'UserController::simpanUser');
$routes->get('/user/edit/(:num)', 'UserController::editUser/$1');
$routes->post('/user/update', 'UserController::updateUser');
$routes->get('/user/hapus/(:num)', 'UserController::hapusUser/$1');


//  routes buat kategori
$routes->get('/kategori/tampil', 'KategoriController::index', ['filter' => 'otentifikasi']);
$routes->get('/kategori/tambah', 'KategoriController::tambahKategori', ['filter' => 'otentifikasi']);
$routes->post('/kategori/simpan', 'KategoriController::simpanKategori', ['filter' => 'otentifikasi']);
$routes->get('/kategori/edit/(:num)', 'KategoriController::editKategori/$1', ['filter' => 'otentifikasi']);
$routes->post('/kategori/update', 'KategoriController::updateKategori', ['filter' => 'otentifikasi']);
$routes->post('/kategori/cari', 'KategoriController::cariKategori', ['filter' => 'otentifikasi']);
$routes->get('/kategori/hapus/(:num)', 'KategoriController::hapusKategori/$1', ['filter' => 'otentifikasi']);

// routes buat menu
$routes->get('/menu/tampil', 'MenuController::index', ['filter' => 'otentifikasi']);
$routes->get('/menu/tambah', 'MenuController::tambahMenu', ['filter' => 'otentifikasi']);
$routes->post('/menu/simpan', 'MenuController::simpanMenu', ['filter' => 'otentifikasi']);
$routes->get('/menu/edit/(:num)', 'MenuController::editMenu/$1', ['filter' => 'otentifikasi']);
$routes->post('/menu/update', 'MenuController::updateMenu', ['filter' => 'otentifikasi']);
$routes->get('/menu/hapus/(:num)', 'MenuController::hapusMenu/$1', ['filter' => 'otentifikasi']);
$routes->get('/menu/search', 'MenuController::searchMenu');



// routes penjualan
$routes->get('/penjualan/tampil', 'PenjualanController::index', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/table', 'PenjualanController::table', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/cek', 'PenjualanController::cek', ['filter' => 'otentifikasi']);
$routes->post('/penjualan/add', 'PenjualanController::add', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/remove/(:any)', 'PenjualanController::remove/$1', ['filter' => 'otentifikasi']);
$routes->post('/penjualan/update', 'PenjualanController::update', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/keranjang', 'PenjualanController::keranjang', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/reset', 'PenjualanController::reset', ['filter' => 'otentifikasi']);
$routes->post('/penjualan/pembayaran', 'PenjualanController::pembayaran', ['filter' => 'otentifikasi']);
$routes->get('/penjualan/detail', 'PenjualanController::detail', ['filter' => 'otentifikasi']);


//routes laporan
$routes->get('/laporan/tampil', 'LaporanController::tampil', ['filter' => 'otentifikasi']);
$routes->post('/laporan/print', 'LaporanController::print', ['filter' => 'otentifikasi']);
$routes->post('/laporan/view', 'LaporanController::view', ['filter' => 'otentifikasi']);
$routes->get('/laporan/viewMonth', 'LaporanController::viewMonth', ['filter' => 'otentifikasi']);
$routes->post('/laporan/month', 'LaporanController::month', ['filter' => 'otentifikasi']);
$routes->post('/laporan/printMonth', 'LaporanController::printMonth', ['filter' => 'otentifikasi']);
