<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



 $routes->get('/', 'Auth::index');
 $routes->post('authenticate', 'Auth::authenticate');
 $routes->get('logout', 'Auth::logout');
 $routes->post('create', 'Auth::create');
 $routes->get('register', 'Auth::register');
 $routes->get('login', 'Auth::login');
 $routes->post('createUser', 'Auth::createUser');
 
 $routes->match(['get', 'post'], 'delete/(:num)', 'Users::delete/$1');

 
 //rotas produto
 $routes->get('produtos', 'ProdutoController::index');
 $routes->get('produtos/(:num)', 'ProdutoController::show/$1'); 
 $routes->get('produtos/create', 'ProdutoController::create', ['filter' => 'AdmFilter']);
 $routes->post('produtos/store', 'ProdutoController::store');
 $routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1', ['filter' => 'auth']);
 $routes->post('produtos/update/(:num)', 'ProdutoController::update/$1');
 $routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1');




//Rotas Carrinho
$routes->post('carrinho/add/(:num)', 'Carrinho::addToCarrinho/$1');
$routes->get('carrinho', 'Carrinho::viewCarrinho');
