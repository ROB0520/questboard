<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
	protected $db;

	public function __construct()
	{
		$config = require basePath('config/db.php');

		$this->db = new Database($config);
	}

	public function index()
	{
		$listings = $this->db->query('SELECT * FROM listings')->fetchAll();

		loadView('listings/index', [
			'listings' => $listings
		]);
	}

	public function create()
	{
		loadView('listings/create');
	}

	public function show($params)
	{

		$listingId = $params['id'] ?? null;
		$params = ['id' => $listingId];

		$listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

		// If listing not found, show 404 error
		if (!$listing) {
			ErrorController::notFound("The listing you are looking for could not be found.");
			exit;
		}

		loadView('listings/show', ['listing' => $listing]);
	}

	public function store()
	{
		$allowedFields = ['title', 'description', 'salary', 'requirements', 'benefits', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email'];

		$newListingData = array_intersect_key($_POST, array_flip($allowedFields));

		$newListingData['user_id'] = 1; // For simplicity, we're hardcoding the user ID here. In a real application, you would get this from the authenticated user.

		$newListingData = array_map('sanitizeInput', $newListingData);

		$requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];

		$errors = [];

		foreach ($requiredFields as $field) {
			if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
				$errors[$field] = ucfirst($field) . " is required and must be valid.";
			}
		}

		if (!empty($errors)) {
			loadView('listings/create', ['errors' => $errors, 'old' => $newListingData]);
		} else {
			$fields = [];

			foreach ($newListingData as $field => $value) {
				$fields[] = $field;
			}

			$fields = implode(', ', $fields);

			$values = [];

			foreach ($newListingData as $field => $value) {
				if ($value === "") {
					$newListingData[$field] = null;
				} else {
					$values[] = ":" . $field;
				}
			}

			$values = implode(', ', $values);

			$query = "INSERT INTO listings ($fields) VALUES ($values)";
			$this->db->query($query, $newListingData);

			$_SESSION['success_msg'] = "Listing created successfully.";

			redirect('/listings');
		}
	}

	public function destroy($params)
	{
		$listingId = $params['id'] ?? null;

		if (!$listingId) {
			ErrorController::notFound("The listing you are trying to delete could not be found.");
			exit;
		}

		$listing = $this->db->query('SELECT id FROM listings WHERE id = :id', ['id' => $listingId])->fetch();
		if (!$listing) {
			ErrorController::notFound("The listing you are trying to delete could not be found.");
			exit;
		}

		$this->db->query('DELETE FROM listings WHERE id = :id', ['id' => $listingId]);

		$_SESSION['success_msg'] = "Listing deleted successfully.";

		redirect('/listings');
	}
}
