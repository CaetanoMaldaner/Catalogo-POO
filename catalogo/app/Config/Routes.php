<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Auth::index');
 $routes->post('authenticate', 'Auth::authenticate');
 $routes->get('logout', 'Auth::logout');
 $routes->get('create', 'Auth::create');
 $routes->get('register', 'Auth::register');
 $routes->post('createUser', 'Auth::createUser');
 
 $routes->get('dashboard', 'Home::index', ['filter'=>'auth']);

 //carrinho
 $routes->get('/cart', 'CartController::index');
 $routes->get('/cart/add/(:num)', 'CartController::addToCart/$1');
 $routes->get('/cart/remove/(:num)', 'CartController::removeFromCart/$1');
 $routes->get('/cart/checkout', 'CartController::checkout');
 
//usuário
$routes->get('users', 'Users::index');
$routes->get('users/create', 'Users::create');
$routes->post('users', 'Users::store');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->put('users/update/(:num)', 'Users::update/$1');
$routes->delete('users/delete/(:num)', 'Users::delete/$1');

//produto
$routes->get('products', 'Products::index');
$routes->get('products/(:num)', 'Products::show/$1');
$routes->post('products/add-to-cart/(:num)', 'Products::addToCart/$1');
$routes->get('cart', 'Products::cart');
$routes->get('checkout', 'Products::checkout');

 