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
 $routes->get('/carrinho', 'Carrinho::index');
 $routes->get('/carrinho/adicionar/(:num)', 'Carrinho::addToCarrinho/$1');
 $routes->get('/carrinho/remover/(:num)', 'Carrinho::removeFromCarrinho/$1');
 $routes->get('/carrinho/limpar', 'Carrinho::clearCarrinho');
 
 
 // Rota de teste
 $routes->get('teste', 'TesteController::index');
 
//



 $routes->get('produtos', 'ProdutoController::index');
  // Rota para visualizar um produto específico
 $routes->get('produtos/(:num)', 'ProdutoController::show/$1'); 
//
 $routes->get('produtos/create', 'ProdutoController::create');

 $routes->post('produtos/store', 'ProdutoController::store');
 

 $routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1');

 $routes->post('produtos/update/(:num)', 'ProdutoController::update/$1');
 
 // Rota para deletar um produto
 $routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1');
 
 