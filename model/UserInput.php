<?php

namespace model;

use PDO;
use service\DatabaseService as DatabaseService;

class UserInput
{
	const TABLE = 'input';

	private $id;
	private $text;

	private static function instantiate($data)
	{
		$obj = new static();

		foreach ($data as $key => $val) {
			$obj->$key = $val;
		}

		return $obj;
	}

	public function getId(): int
	{
		return (int)$this->id;
	}
	
	public function getText(): string
	{
		return htmlspecialchars($this->text);
	}

	public static function save(string $text, ?int $id = null)
	{
		$database = DatabaseService::getInstance();
		$sql = "INSERT INTO `input`(`id`, `text`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `text` = ?";
		$statement = $database->prepare($sql);
		$statement->execute([
			$id,
			$text,
			$text
		]);
	}
	
	public static function get(): UserInput
	{
		$database = DatabaseService::getInstance();
		$sql = "SELECT * FROM ".self::TABLE." LIMIT 1";
		$stmt = $database->query($sql);
		
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		return self::instantiate($data);
	}
}