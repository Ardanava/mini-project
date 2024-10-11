<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('lengkap/(:any)', 'Home::lengkap/$1');
$routes->get('kategori/(:segment)', 'Home::kategori/$1');
$routes->post('cari', 'Home::cari');
