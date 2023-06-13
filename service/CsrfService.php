<?php

namespace service;

class CsrfService
{
	private static function _csrfToken($id)
	{
		@session_start();
		$token = md5(uniqid(mt_rand(), true));
		$_SESSION['csrf_'.$id] = $token;
		return $token;
	}

	public static function csrfToken($id)
	{
		$token = self::_csrfToken($id);
		return '<input type="hidden" name="csrf_token" value="'.$token.'">'."\n";
	}

	private static function _csrfCheck($id, $token)
	{
		@session_start();
		return ($token == @$_SESSION['csrf_'.$id]);
	}

	public static function csrfCheck($id)
	{
		if (!self::_csrfCheck($id, @$_POST['csrf_token'])) {
			die('Invalid csrf token');
		}
	}
}