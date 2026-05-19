<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use Framework\Authorization;

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
		$listings = $this->db->query('SELECT * FROM listings ORDER BY created_at DESC')->fetchAll();

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

		$newListingData['user_id'] = Session::get('user')['id'];

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

			Session::setFlashMessage('success_msg', "Quest published successfully.");

			redirect('/listings');
		}
	}

	public function destroy($params)
	{
		$listingId = $params['id'] ?? null;

		if (!$listingId) {
			ErrorController::notFound("The quest you are trying to delete could not be found.");
			exit;
		}

		$listing = $this->db->query('SELECT user_id FROM listings WHERE id = :id', ['id' => $listingId])->fetch();
		if (!$listing) {
			ErrorController::notFound("The quest you are trying to delete could not be found.");
			exit;
		}

		// Ensure the user is authorized to delete this listing (e.g., they are the owner)
		if (!Authorization::isOwner($listing->user_id)) {
			Session::setFlashMessage('error_msg', "You do not have permission to delete this quest.");
			redirect('/listings/' . $listingId);
		}

		$this->db->query('DELETE FROM listings WHERE id = :id', ['id' => $listingId]);

		Session::setFlashMessage('success_msg', "Quest abandoned successfully.");

		redirect('/listings');
	}

	public function edit($params)
	{
		$listingId = $params['id'] ?? null;

		if (!$listingId) {
			ErrorController::notFound("The quest you are trying to edit could not be found.");
			exit;
		}

		$listing = $this->db->query('SELECT * FROM listings WHERE id = :id', ['id' => $listingId])->fetch();

		if (!$listing) {
			ErrorController::notFound("The quest you are trying to edit could not be found.");
			exit;
		}

		// Ensure the user is authorized to edit this listing (e.g., they are the owner)
		if (!Authorization::isOwner($listing->user_id)) {
			Session::setFlashMessage('error_msg', "You do not have permission to edit this quest.");
			redirect('/listings/' . $listingId);
		}

		loadView('listings/edit', ['listing' => $listing]);
	}

	public function update($params)
	{
		$listingId = $params['id'] ?? null;

		if (!$listingId) {
			ErrorController::notFound("The quest you are trying to update could not be found.");
			exit;
		}

		$listing = $this->db->query('SELECT * FROM listings WHERE id = :id', ['id' => $listingId])->fetch();

		if (!$listing) {
			ErrorController::notFound("The quest you are trying to update could not be found.");
			exit;
		}

		// Ensure the user is authorized to update this listing (e.g., they are the owner)
		if (!Authorization::isOwner($listing->user_id)) {
			Session::setFlashMessage('error_msg', "You do not have permission to update this quest.");
			redirect('/listings/' . $listingId);
		}

		$allowedFields = ['title', 'description', 'salary', 'requirements', 'benefits', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email'];

		$updatedListingData = array_intersect_key($_POST, array_flip($allowedFields));

		$updatedListingData = array_map('sanitizeInput', $updatedListingData);

		$requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];

		$errors = [];

		foreach ($requiredFields as $field) {
			if (empty($updatedListingData[$field]) || !Validation::string($updatedListingData[$field])) {
				$errors[$field] = ucfirst($field) . " is required and must be valid.";
			}
		}

		if (!empty($errors)) {
			loadView('listings/edit', ['errors' => $errors, 'listing' => $listing]);
		} else {
			$updateFields = [];

			foreach (array_keys($updatedListingData) as $field) {
				$updateFields[] = "$field = :$field";
			}
			$updateFields = implode(', ', $updateFields);

			$query = "UPDATE listings SET $updateFields WHERE id = :id";

			$this->db->query($query, array_merge($updatedListingData, ['id' => $listingId]));

			Session::setFlashMessage('success_msg', "Quest updated successfully.");

			redirect('/listings/' . $listingId);
		}
	}

	public function search()
	{
		$keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
		$location = isset($_GET['location']) ? trim($_GET['location']) : '';

		$query = "SELECT * FROM listings WHERE (title LIKE :keywords OR description LIKE :keywords OR company LIKE :keywords OR tags LIKE :keywords) AND (city LIKE :location OR state LIKE :location) ORDER BY created_at DESC";

		$params = [
			'keywords' => '%' . $keywords . '%',
			'location' => '%' . $location . '%'
		];

		$listings = $this->db->query($query, $params)->fetchAll();

		loadView('listings/index', [
			'listings' => $listings,
			'keywords' => $keywords,
			'location' => $location
		]);
	}
}
