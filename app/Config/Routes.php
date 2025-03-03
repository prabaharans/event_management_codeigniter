<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', );
$routes->get('/user-info', 'Home::userInfo', );
$routes->get('/', 'LoginController::loginView');
$routes->get('student', 'Home::studentDashboard');
$routes->get('admin', 'Home::adminDashboard', ['filter' => 'group:admin']);


$routes->group("api", function ($routes) {
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::index", ['filter' => 'authFilter']);
    $routes->get("user-info/(:num)", "API\User::info/$1", ['filter' => 'authFilter']);
});
service('auth')->routes($routes);
