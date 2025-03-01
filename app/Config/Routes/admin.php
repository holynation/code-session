<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('web/authenticate', 'Auth::login', ['filter' => 'apiValidation']);
$routes->post('web/logout', 'Auth::logout', ['filter' => 'apiValidation']);

$routes->group('web', ['filter' => 'apiValidation'], function ($routes) {
    $routes->add('(:any)', 'Api::webApi/$1');
    $routes->add('(:any)/(:any)', 'Api::webApi/$1/$2');
    $routes->add('(:any)/(:any)', 'Api::webApi/$1/$2/$3');
});

$routes->post('event/session_status', 'Events::session_status', ['filter' => 'apiValidation']);
$routes->get('link/validate_tunnel', 'LinkValidator::validator', ['filter' => 'apiValidation']);
$routes->get('link/validate_matric', 'LinkValidator::validate_matric', ['filter' => 'apiValidation']);