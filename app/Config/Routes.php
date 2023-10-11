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
// $routes->set404Override();
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Customer
$routes->group('customer', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Customer::index');
    $routes->get('akun', 'Customer::akun');
    $routes->post('akun/save', 'Customer::saveAkun');
});

$routes->get('/', 'Customer::index');
$routes->get('/produk/(:any)/(:any)', 'Customer::produk/$1/$2');
$routes->get('/detail/(:any)', 'Customer::detailProduk/$1');

// Signup
$routes->add('/signup', 'Signup::index');
$routes->post('/signup/auth', 'Signup::auth');

// Login
$routes->add('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

// Lupa Password
$routes->add('/lupa-password', 'Login::lupaPassword');
$routes->post('/lupa-password/auth', 'Login::lupaPasswordAuth');

// Logout
$routes->get('/logout', 'Login::logout');

// About Us
$routes->get('/tentang', 'Tentang::index');

// Designer
$routes->group('designer', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Designer::index');

    $routes->get('chat', 'Designer::chat');

    $routes->get('data-produk/tambah', 'Designer::tambahProduk');
    $routes->post('data-produk/tambah', 'Designer::tambahProduk');

    $routes->get('data-produk/(:any)', 'Designer::produk/$1');
    // $routes->get('akun', 'Customer::akun');
    // $routes->post('akun/save', 'Customer::saveAkun');
});

// Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin::index');
    $routes->get('dashboard/(:any)', 'Admin::index/$1');
    $routes->get('dashboard/(:any)/(:any)', 'Admin::index/$1/$2');
    $routes->get('dashboard/(:any)/(:any)/(:any)', 'Admin::index/$1/$2/$3');

    // Transaksi
    $routes->get('transaksi/details/(:any)', 'Admin::details/$1');
    $routes->post('transaksi/details/(:any)', 'Admin::details/$1');

    $routes->get('transaksi/cetak/(:any)', 'Admin::cetak/$1');
    $routes->get('transaksi/cetak/(:any)/(:any)', 'Admin::cetak/$1/$2');

    $routes->get('transaksi/(:any)', 'Admin::transaksi/$1');
    $routes->get('transaksi/(:any)/(:any)', 'Admin::transaksi/$1/$2');

    // Data Produk
    $routes->get('data-produk/details/(:any)', 'Admin::produkDetails/$1');
    $routes->post('data-produk/details/(:any)', 'Admin::produkDetails/$1');

    $routes->get('data-produk/hapus/(:any)', 'Admin::produkDelete/$1');

    $routes->get('data-produk/tambah', 'Admin::tambahProduk');
    $routes->post('data-produk/tambah', 'Admin::tambahProduk');

    $routes->get('data-produk/(:any)', 'Admin::produk/$1');

    // Database
    $routes->get('database', 'Admin::database');

    $routes->get('database/kategori/hapus/(:any)', 'Admin::deleteKategori/$1');
    $routes->post('database/kategori/tambah', 'Admin::tambahKategori');

    $routes->get('database/admin/hapus/(:any)', 'Admin::hapusAdmin/$1');
    $routes->post('database/admin/tambah', 'Admin::tambahAdmin');
    $routes->get('database/admin/detail/(:any)', 'Admin::database/$1');
    $routes->post('database/admin/detail/(:any)', 'Admin::detailAdmin/$1');

    $routes->get('database/designer/hapus/(:any)', 'Admin::hapusDesigner/$1');
    $routes->post('database/designer/tambah', 'Admin::tambahDesigner');
    $routes->get('database/designer/detail/(:any)', 'Admin::database/$1');
    $routes->post('database/designer/detail/(:any)', 'Admin::detailDesigner/$1');

    $routes->get('database/customer/hapus/(:any)', 'Admin::hapusCustomer/$1');

    $routes->get('database/(:any)', 'Admin::database/$1');
    // $routes->get('database/(:any)/(:any)', 'Admin::database/$1/$2');
    // $routes->get('database/(:any)/(:any)/(:any)', 'Admin::database/$1/$2/$3');

    // $routes->get('akun', 'Customer::akun');
    // $routes->post('akun/save', 'Customer::saveAkun');
});

// Chat
$routes->group('chat', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Chat::index');
    $routes->get('allUser', 'Chat::allUser');
    $routes->get('getIndividual/(:any)', 'Chat::getIndividual/$1');
    $routes->post('setNoMessage', 'Chat::setNoMessage');
    $routes->post('getMessage', 'Chat::getMessage');
    $routes->post('sent', 'Chat::sendMessage');

    // $routes->get('dashboard/(:any)/(:any)', 'Admin::index/$1/$2');
    // $routes->get('dashboard/(:any)/(:any)/(:any)', 'Admin::index/$1/$2/$3');

    // $routes->get('transaksi/details/(:any)', 'Admin::details/$1');
    // $routes->post('transaksi/details/(:any)', 'Admin::details/$1');

    // $routes->get('transaksi/(:any)', 'Admin::transaksi/$1');
    // $routes->get('transaksi/(:any)/(:any)', 'Admin::transaksi/$1/$2');


    // $routes->post('data-produk/details/(:any)', 'Admin::produkDetails/$1');
    // $routes->get('data-produk/tambah', 'Admin::tambahProduk');
    // $routes->post('data-produk/tambah', 'Admin::tambahProduk');

    // $routes->get('data-produk/(:any)', 'Admin::produk/$1');

    // $routes->get('akun', 'Customer::akun');
    // $routes->post('akun/save', 'Customer::saveAkun');
});



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
