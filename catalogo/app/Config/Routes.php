<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');


$routes->get('dashboard', 'Home::index');
