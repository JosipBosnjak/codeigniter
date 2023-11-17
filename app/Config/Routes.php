<?php

// app/Config/Routes.php

use App\Controllers\AuthController;

$routes->get('/', 'AuthController::login');


$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');

$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('register', 'AuthController::register');
    $routes->post('processRegistration', 'AuthController::processRegistration');
    $routes->add('login', 'AuthController::login');
    $routes->post('processLogin', 'AuthController::processLogin');
    $routes->get('logout', 'AuthController::logout');
});





