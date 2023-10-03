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
 $routes->get('login', 'Auth::login');
 $routes->post('createUser', 'Auth::createUser');
 
 $routes->get('dashboard', 'Home::index', ['filter'=>'auth']);

 //carrinho
$routes->get('carrinho', 'Carrinho::index');
$routes->get('carrinho/add/(:num)', 'Carrinho::addToCarrinho/$1');
$routes->get('carrinho/remove/(:num)', 'Carrinho::removeFromCarrinho/$1');
$routes->get('carrinho/clear', 'Carrinho::clearCarrinho');


 