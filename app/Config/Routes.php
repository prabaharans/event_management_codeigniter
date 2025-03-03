<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', );
$routes->get('/', 'LoginController::loginView');
$routes->get('student', 'Home::studentDashboard');
$routes->get('admin', 'Home::adminDashboard', ['filter' => 'group:admin']);

service('auth')->routes($routes);
