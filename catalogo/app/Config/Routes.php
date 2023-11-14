<?php

use CodeIgniter\Router\RouteCollection;
use App\Filters\AdmFilter;
use App\Filters\AuthFilter;


/**
 * @var RouteCollection $routes
 */


// Rotas de autenticação
$routes->get('/', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');
$routes->post('create', 'Auth::create');
$routes->get('register', 'Auth::register');
$routes->get('login', 'Auth::login');
$routes->post('createUser', 'Auth::createUser');
$routes->get('perfil', 'Auth::perfil');
$routes->post('perfil/update', 'Auth::updatePerfil');
$routes->get('perfil/delete', 'Auth::deletePerfil');


$routes->match(['get', 'post'], 'delete/(:num)', 'Users::delete/$1');

//Rotas das Categorias
$routes->get('categorias/create', 'CategoriaController::create', ['filter' => 'AdmFilter']);
$routes->post('categorias/store', 'CategoriaController::store', ['filter' => 'AdmFilter']);

//Rotas dos Produtos
$routes->get('produtos', 'ProdutoController::index');
$routes->get('produtos/(:num)', 'ProdutoController::show/$1');
$routes->get('produtos/create', 'ProdutoController::create', ['filter' => 'AdmFilter']);
$routes->post('produtos/store', 'ProdutoController::store', ['filter' => 'AdmFilter']);
$routes->get('produtos/edit/(:num)', 'ProdutoController::edit/$1', ['filter' => 'AdmFilter']);
$routes->post('produtos/update/(:num)', 'ProdutoController::update/$1', ['filter' => 'AdmFilter']);
$routes->get('produtos/delete/(:num)', 'ProdutoController::delete/$1', ['filter' => 'AdmFilter']);

// Rotas do carrinho
$routes->post('carrinho/add/(:num)', 'Carrinho::addToCarrinho/$1');
$routes->get('carrinho', 'Carrinho::viewCarrinho');
$routes->post('carrinho/limpar', 'Carrinho::limparCarrinho');
$routes->post('carrinho/finalizar-compra', 'Carrinho::finalizarCompra');
