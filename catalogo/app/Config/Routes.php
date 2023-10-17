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

$routes->get('/welcome_message', 'Auth::welcomeMessage');

 // Rotas do carrinho
 $routes->get('carrinho', 'Carrinho::index');
 $routes->get('carrinho/add/(:num)', 'Carrinho::addToCarrinho/$1');
 $routes->get('carrinho/remove/(:num)', 'Carrinho::removeFromCarrinho/$1');
 $routes->get('carrinho/clear', 'Carrinho::clearCarrinho');
 
 // Rota de teste
 $routes->get('teste', 'TesteController::index');
 

 
 $routes->get('produtos', 'ProdutoController::index');
 $routes->get('produtos/(:num)', 'ProdutoController::show/$1'); // Rota para visualizar um produto específico
 
 // Rota para exibir o formulário de criação de produto
 $routes->get('produtos/create', 'ProdutoController::create');
 // Rota para processar o formulário de criação de produto
 $routes->post('produtos/store', 'ProdutoController::store');
 
 // Rota para exibir o formulário de edição de produto
 $routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1');
 // Rota para processar o formulário de edição de produto
 $routes->post('produtos/update/(:num)', 'ProdutoController::update/$1');
 
 // Rota para deletar um produto
 $routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1');
 
 