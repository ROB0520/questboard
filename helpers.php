<?php

/**
 * Get the Path
 * @param string $path Path to View File
 * @return string Full Path to View File
 */
function basePath($path = "")
{
	return __DIR__ . '/' . $path;
}

/**
 * Load View
 * @param string $name View File to Load
 * @return string|null Full path when loaded, otherwise null
 */
function loadView($name)
{
	if ($name) {
		$viewPath = basePath("views/{$name}.view.php");

		if (file_exists($viewPath)) {
			require $viewPath;
			return $viewPath;
		} else {
			echo "<p>View '{$name}' not found.</p>";
			return null;
		}
	} else {
		echo "<p>No view name provided.</p>";
		return null;
	}
}

/**
 * Load Partial
 * @param string $name Partial File to Load
 * @return string|null Full path when loaded, otherwise null
 */
function loadPartial($name)
{
	if ($name) {
		$partialPath = basePath("views/partials/{$name}.php");

		if (file_exists($partialPath)) {
			require $partialPath;
			return $partialPath;
		} else {
			echo "<p>Partial '{$name}' not found.</p>";
			return null;
		}
	} else {
		echo "<p>No partial name provided.</p>";
		return null;
	}
}

/**
 * Inspect Variable
 *
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}
