<?php

namespace Config;

use DeepCopy\Filter\Filter;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
	echo view('404.html');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/DataJudul', 'Home::dataJudul');
$routes->get('/detailDokumen/(:any)', 'Home::detail/$1');

// $routes->get('/Transaksi', 'TransaksiController::index');
//user manajemen
$routes->group('Transaksi', ['filter' => 'role:member'], function ($routes) {
	$routes->post('Pinjam/(:num)', 'Member\TransaksiController::pinjam/$1');
	$routes->post('Kembali/(:num)', 'Member\TransaksiController::kembali/$1');
});
$routes->group('Keranjang', ['filter' => 'role:member'], function ($routes) {
	$routes->get('/', 'Member\KeranjangController::index');
});
$routes->group('Profile', ['filter' => 'role:member'], function ($routes) {
	$routes->get('/', 'Member\ProfileController::index');
	$routes->post('update/(:num)', 'Member\ProfileController::update/$1');
});


$routes->group('Admin', ['filter' => 'role:superadmin,admin'], function ($routes) {
	$routes->get('/', 'Admin\Dashboard::index');
	$routes->post('/', 'Admin\Dashboard::index');

	$routes->post('Profile/update/(:num)', 'Admin\ProfileController::update/$1');
	$routes->get('Profile', 'Admin\ProfileController::index');

	//user manajemen
	$routes->group('UserManage', ['filter' => 'role:superadmin'], function ($routes) {
		$routes->get('/', 'Admin\UserController::index');
		$routes->get('(:num)', 'Admin\UserController::detail/$1');
		$routes->post('LevelUp/(:num)', 'Admin\UserController::active/$1');
		$routes->post('LevelDown/(:num)', 'Admin\UserController::deactive/$1');
	});

	$routes->group('Transaksi', ["namespace" => "App\Controllers\Admin"], function ($routes) {
		$routes->get('/', 'TransaksiController::index');
		$routes->post('DeleteBatch', 'TransaksiController::deleteBatch');
		$routes->post('Acc/(:num)', 'TransaksiController::AccPinjam/$1');
		$routes->get('lapExcel', 'TransaksiController::lapExcel');
		$routes->post('Terima/(:num)', 'TransaksiController::AccKembali/$1');
	});
	//dokumen 
	$routes->group('Dokumen',  function ($routes) {
		$routes->match(['get', 'post'], '/', 'Admin\DokumenController::index');
		$routes->get('create', 'Admin\DokumenController::create');
		$routes->post('save', 'Admin\DokumenController::save');
		$routes->post('update/(:any)', 'Admin\DokumenController::update/$1');
		$routes->get('delete/(:any)', 'Admin\DokumenController::delete/$1');
		$routes->get('lapExcel', 'Admin\DokumenController::lapExcel');
		$routes->get('detail/(:any)', 'Admin\DokumenController::detail/$1');
		$routes->get('edit/(:any)', 'Admin\DokumenController::edit/$1');
	});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
