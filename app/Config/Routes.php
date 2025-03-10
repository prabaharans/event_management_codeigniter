<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', );
$routes->get('/holidays', 'Home::holidays', );
$routes->get('/user-info', 'Home::userInfo', );
$routes->get('/', 'LoginController::loginView');
$routes->get('student', 'Home::studentDashboard');
$routes->get('admin', 'Home::adminDashboard', ['filter' => 'group:admin']);

// $routes->get('img-country-flag/(:any)', 'CountryImageController::show/$1');
$routes->post('/countries/getPhoneCodes', 'CountriesController::getPhoneCodes');
$routes->post('/holidays/ajaxHolidaysDataTables', 'Home::ajaxHolidaysDataTables');
$routes->get("holiday/ajaxGet/(:num)", "Home::ajaxGet/$1");


$routes->group("api", function ($routes) {
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::index", ['filter' => 'authFilter']);
    $routes->get("user-info/(:num)", "API\User::info/$1", ['filter' => 'authFilter']);
    $routes->post("event-booking", "API\Event::booking", ['filter' => 'authFilter']);
    $routes->post("holiday/update", "API\Holiday::update", ['filter' => 'authFilter']);
});
service('auth')->routes($routes);
