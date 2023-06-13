<?php

namespace service;

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', "root");

class DatabaseService
{
	private static $instance = null;

	private function __construct()
	{

	}

	private function __clone()
	{

	}

	public static function getInstance()
	{
		if (!self::$instance) {
			try {
				self::$instance = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

				$st = self::$instance->prepare("SET NAMES 'utf8'");
				$st->execute();
			}
			catch(\PDOException $e)
			{
				die($e->getMessage());
			}
		}

		return self::$instance;
	}
}