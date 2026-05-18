<?php

namespace Framework;

class Validation
{
	/**
	 * Validate a string
	 * 
	 * @param string $value
	 * @param int $min
	 * @param int $max
	 * 
	 * @return bool
	 */
	public static function string($value, $min = 1, $max = INF)
	{
		if (!is_string($value)) {
			return false;
		}

		$length = strlen($value);

		if ($length < $min || $length > $max) {
			return false;
		}

		return true;
	}

	/**
	 * Validate an email address
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function email($value)
	{
		$value = trim($value);

		return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
	}

	/**
	 * Check if values are matching
	 * 
	 * @param string $value1
	 * @param string $value2
	 * 
	 * @return bool
	 */
	public static function match($value1, $value2)
	{
		return trim($value1) === trim($value2);
	}
}
