<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', function() {
	return view('dashboard/index');
});
$routes->get('pelamar', 'Pelamar::index');
$routes->match(['get', 'post'], 'pelamar/create', 'Pelamar::create');
$routes->match(['get', 'post'], 'pelamar/edit/(:num)', 'Pelamar::edit/$1');
$routes->get('pelamar/delete/(:num)', 'Pelamar::delete/$1');
$routes->get('user', 'User::index');
$routes->match(['get', 'post'], 'user/create', 'User::create');
$routes->match(['get', 'post'], 'user/edit/(:num)', 'User::edit/$1');
