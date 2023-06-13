<?php

namespace model;

class SmsDTO extends ContactMessageDTO
{
	private $phone;

	public function setPhone(string $phone)
	{
		$this->phone = $phone;
	}
	
	public function getPhone(): string
	{
		return $this->phone;
	}
}