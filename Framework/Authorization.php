<?php

namespace Framework;

use Framework\Session;

class Authorization
{
	/**
	 * Check if user is logged in owns listing
	 * 
	 * @param int $listingId
	 * 
	 * @return bool
	 */
	public static function isOwner($listingId)
	{
		$sessionUser = Session::get('user');

		if ($sessionUser !== null && isset($sessionUser)) {
			$sessionUserId = (int) $sessionUser['id'];

			return $sessionUserId === $listingId;
		}

		return false;
	}
}
