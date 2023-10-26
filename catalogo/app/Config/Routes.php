<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index'); //view('welcome_message');
$routes->get('register', 'Auth::register'); //view('register');
$routes->get('login', 'Auth::login'); //view('login');

$routes->post('authenticate', 'Auth::authenticate'); //Autenticação do user
$routes->get('logout', 'Auth::logout'); //Destroi a sessão e desloga
$routes->post('create', 'Auth::create'); //Cria um usuario


// Rotas do carrinho
// $routes->get('/carrinho', 'Carrinho::index');
// $routes->get('/carrinho/adicionar/(:num)', 'Carrinho::addToCarrinho/$1');
// $routes->get('/carrinho/remover/(:num)', 'Carrinho::removeFromCarrinho/$1');
// $routes->get('/carrinho/limpar', 'Carrinho::clearCarrinho');


//Rotas Produto
$routes->get('produtos', 'ProdutoController::index');
$routes->get('produtos/(:num)', 'ProdutoController::show/$1');
$routes->get('produtos/create', 'ProdutoController::create');
$routes->post('produtos/store', 'ProdutoController::store');
$routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1', ['filter' => 'auth']);
$routes->post('produtos/update/(:num)', 'ProdutoController::update/$1');
$routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1');
