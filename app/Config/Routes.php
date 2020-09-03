<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get','post'],'/', 'Users::index',['filter' => 'noauth']);
$routes->match(['get','post'],'logout', 'Users::logout');
$routes->match(['get','post'],'register', 'Users::register',['filter' => 'noauth']);
$routes->match(['get','post'],'test', 'Test::index');


// Fish Routes
$routes->group('fish',['filter' => 'auth'],function($routes){
	$routes->add('/','Fish::index');
	$routes->match(['get','post'],'add','Fish::create');	
	$routes->match(['get','post'],'edit/(:any)','Fish::edit/$1');
	$routes->get('delete/(:any)','Fish::delete/$1');
	
	$routes->group('tank', function($routes){
		$routes->add('/','FishTank::index');
		$routes->match(['get','post'],'add','FishTank::create');
		$routes->get('delete/(:any)','FishTank::delete/$1');

	});
});


// Food Rootes
$routes->group('food',['filter' => 'auth'], function($routes){
	$routes->add('/','food::index');
	$routes->match(['get','post'],'add','food::create');
	$routes->group('history', function($routes){
		$routes->add('/','FoodHistory::index');
		$routes->match(['get','post'],'add','FoodHistory::create');

	});
});

// Vaccin Rootes
$routes->group('vaccination',['filter' => 'auth'], function($routes){
	$routes->add('/','food::index');
	$routes->match(['get','post'],'add','food::add');

	$routes->group('history', function($routes){
		$routes->add('/','foodhistory::index');
		$routes->match(['get','post'],'add','foodhistory::create');

	});
});

// staff
$routes->group('staff', ['filter' => 'auth'],function($routes){
	$routes->add('/','staff::index');
	$routes->add('add','staff::create');
	$routes->add('view/(:any)','staff::view/$1');
	$routes->add('edit/(:any)','staff::edit/$1');
	$routes->add('delete/(:any)','staff::delete/$1');
});
// client
$routes->group('client', ['filter' => 'auth'],function($routes){
	$routes->add('/','client::index');
	$routes->add('add','client::create');
	$routes->add('view/(:any)','client::view/$1');
	$routes->add('edit/(:any)','client::edit/$1');
	$routes->add('delete/(:any)','client::delete/$1');
});
// product
$routes->group('product', ['filter' => 'auth'],function($routes){
	$routes->add('/','product::index');
	$routes->add('add','product::create');
	$routes->add('view/(:any)','product::view/$1');
	$routes->add('edit/(:any)','product::edit/$1');
	$routes->add('delete/(:any)','product::delete/$1');
});
// sales
// purchase
// expenses
$routes->group('expense',['filter' => 'auth'],function($routes){
	$routes->add('/','Expense::index');
	$routes->match(['get','post'],'add','Expense::create');	
	$routes->match(['get','post'],'edit/(:any)','Expense::edit/$1');
	$routes->get('delete/(:any)','Expense::delete/$1');
});
// supplier
$routes->group('supplier',['filter' => 'auth'],function($routes){
	$routes->add('/','Supplier::index');
	$routes->match(['get','post'],'add','Supplier::create');	
	$routes->match(['get','post'],'edit/(:any)','Supplier::edit/$1');
	$routes->get('delete/(:any)','Supplier::delete/$1');
});

// setting
$routes->group('setting',['filter' => 'auth'], function($routes){
	$routes->add('/','setting::index');
	$routes->add('backup','backup::index');
	$routes->add('backup/dl','backup::dl');
	$routes->add('backup/dl/(:any)','backup::dl/$1');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
