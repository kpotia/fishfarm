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
$routes->add('dashboard', 'Dashboard::index',['filter' => 'auth']);


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
// salesperson
$routes->group('salesperson', ['filter' => 'auth'],function($routes){
	$routes->add('/','SalesUsers::list');
	$routes->add('add','SalesUsers::register');
	$routes->add('view/(:any)','SalesUsers::view/$1');
	$routes->add('edit/(:any)','SalesUsers::edit/$1');
	$routes->add('delete/(:any)','SalesUsers::delete/$1');
});
// product
$routes->group('product', ['filter' => 'auth'],function($routes){
	$routes->add('/','product::index');
	$routes->add('add','product::create');
	$routes->add('view/(:any)','product::view/$1');
	$routes->add('edit/(:any)','product::edit/$1');
	$routes->add('delete/(:any)','product::delete/$1');
});

// purchase
$routes->group('purchase',['filter' => 'auth'],function($routes){
	$routes->add('/','Purchase::index');
	$routes->match(['get','post'],'add','Purchase::create');	
	$routes->match(['get','post'],'edit/(:any)','Purchase::edit/$1');
	$routes->get('delete/(:any)','Purchase::delete/$1');
});
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

// Inventory
$routes->group('inventory',['filter' => 'auth'],function($routes){
	$routes->add('/','Inventory::index');
	$routes->match(['get','post'],'add','Inventory::create');	
	$routes->match(['get','post'],'edit/(:any)','Inventory::edit/$1');
	$routes->get('delete/(:any)','Inventory::delete/$1');
});

// login sales dept 
$routes->match(['get','post'],'salesdpt','SalesUsers::index');


// Salesdpt
$routes->group('salesdpt',['filter' => 'auth'], function ($routes){
	$routes->add('dashboard','SalesUsers::dashboard');
	$routes->match(['get','post'],'pos','Pos::index');
	$routes->match(['get','post'],'viewcart','Pos::viewcart');
	$routes->match(['get','post'],'clearcart','Pos::clearcart');
	$routes->match(['get','post'],'checkout','Pos::checkout');
	$routes->match(['get','post'],'orders','Pos::orders');
	$routes->match(['get','post'],'order/(:any)','Pos::orderdetail/$1');
	$routes->match(['get','post'],'addtocart/(:any)','Pos::addtocart/$1');
});


// reports

$routes->group('report',['filter' => 'auth'], function($routes){
	$routes->add('/','Report::index');
	$routes->add('financial','Report::financial');
	$routes->add('supplier','Report::supplier');
	$routes->add('today','Report::today');

});

// register sales dpt 
$routes->match(['get','post'],'registersalesperson','SalesUsers::register',['filter'=>'auth']);

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
