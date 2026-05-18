<?php

$config = require basePath('config/db.php');

$db = new Database($config);

$listingId = $_GET['id'] ?? null;
$params = ['id' => $listingId];

$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

// If listing not found, show 404 error
if (!$listing) {
	$router = new Router();
	$router->error(404);
}

loadView('listings/show', ['listing' => $listing]);
