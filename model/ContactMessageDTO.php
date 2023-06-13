<?php

namespace model;

class ContactMessageDTO
{
	protected $message;

	public function setMessage(string $message)
	{
		$this->message = $message;
	}

	public function getMessage(): string
	{
		return $this->message;
	}
}