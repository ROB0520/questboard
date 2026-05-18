<?php

// This makes it so that the router variable is available in this file, and we can use it to define our routes.

/** @var mixed $router */

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listings/{id}', 'ListingController@show');
$router->post('/listings', 'ListingController@store');
$router->delete('/listings/{id}', 'ListingController@destroy');
