<?php

// This makes it so that the router variable is available in this file, and we can use it to define our routes.

/** @var mixed $router */

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/search', 'ListingController@search');

$router->get('/listings/create', 'ListingController@create', ['auth']);
$router->get('/listings/{id}/edit', 'ListingController@edit', ['auth']);
$router->get('/listings/{id}', 'ListingController@show');

$router->post('/listings', 'ListingController@store', ['auth']);
$router->put('/listings/{id}', 'ListingController@update', ['auth']);
$router->delete('/listings/{id}', 'ListingController@destroy', ['auth']);

$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);

// Additional routes for the blog and tenary case studies
$router->get('/blog', 'BlogController@index');
