<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/post/view/(:num)', 'Post::view/$1');
$routes->post('/comentario/store', 'Comentario::store');
$routes->get('/post/create/', 'Post::create');
$routes->get('/post/edit/(:num)', 'Post::edit/$1');
$routes->post('post/store', 'Post::store');
$routes->get('/post/sucesso', 'Post::sucesso'); 
$routes->get('/post/delete/(:num)', 'Post::delete/$1');


