<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', );
$routes->get('/', 'LoginController::loginView');

service('auth')->routes($routes);
