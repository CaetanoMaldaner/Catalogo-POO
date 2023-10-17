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
 
 $routes->get('dashboard', 'Home::index', ['filter' => 'auth']);

$routes->get('/welcome_message', 'Auth::dashboard');

 // Rotas do carrinho
 $routes->get('carrinho', 'Carrinho::index');
 $routes->get('carrinho/add/(:num)', 'Carrinho::addToCarrinho/$1');
 $routes->get('carrinho/remove/(:num)', 'Carrinho::removeFromCarrinho/$1');
 $routes->get('carrinho/clear', 'Carrinho::clearCarrinho');
 
 // Rota de teste
 $routes->get('teste', 'TesteController::index');
 
//
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

 