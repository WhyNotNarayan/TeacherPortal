<?php
use CodeIgniter\Router\RouteCollection;

$routes->group('api', function ($routes) {
    $routes->post('register', 'Api::register');
    $routes->post('login', 'Api::login');
    
    // Protected routes
    $routes->get('teachers', 'Api::getTeachers', ['filter' => 'jwt']);
});