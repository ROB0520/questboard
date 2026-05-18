<?php

/**
 * Get the Path
 * 
 * @param string $path Path to View File
 * @return string Full Path to View File
 */
function basePath($path = "")
{
	return __DIR__ . '/' . $path;
}

/**
 * Load View
 * 
 * @param string $name View File to Load
 * @param array $data Data to Pass to View
 * 
 * @return null Full path when loaded, otherwise null
 */
function loadView($name, $data = [])
{
	if ($name) {
		$viewPath = basePath("App/views/{$name}.view.php");

		if (file_exists($viewPath)) {
			extract($data);
			require $viewPath;
		} else {
			echo "<p>View '{$name}' not found.</p>";
		}
	} else {
		echo "<p>No view name provided.</p>";
	}
	return null;
}

/**
 * Load Partial
 * 
 * @param string $name Partial File to Load
 * @return null Full path when loaded, otherwise null
 */
function loadPartial($name)
{
	if ($name) {
		$partialPath = basePath("App/views/partials/{$name}.php");

		if (file_exists($partialPath)) {
			require $partialPath;
		} else {
			echo "<p>Partial '{$name}' not found.</p>";
		}
	} else {
		echo "<p>No partial name provided.</p>";
	}
	return null;
}

/**
 * Inspect Variable
 * 
 * @param mixed $value
 * @param bool $die Whether to stop execution after dumping the variable
 * @return void
 */
function inspect($value, $die = false)
{
	echo '<pre>';
	var_dump($value);
	echo '</pre>';

	if ($die) {
		die();
	}
}

/**
 * Format Salary
 *
 * @param mixed $salary The salary value to format
 * @return string The formatted salary string with a dollar sign and two decimal places
 */
function formatSalary($salary)
{
	return '$' . number_format($salary, 2);
}

/**
 * Sanitize Input
 * 
 * @param string $dirty The input string to sanitize
 * @return string The sanitized input string
 */
function sanitizeInput($dirty)
{
	return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}
