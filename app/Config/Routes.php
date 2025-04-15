<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('/auth/logout', 'Auth::logout');

// Admin Dashboard
$routes->get('/admin/dashboard', 'AdminController::dashboard');

// User Dashboard
$routes->get('/user/dashboard', 'UserController::dashboard');

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
});

$routes->group('user', ['filter' => 'role:user'], function ($routes) {
    $routes->get('dashboard', 'UserController::dashboard');
});