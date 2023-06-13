<?php

namespace model;

class MailDTO extends ContactMessageDTO
{
	private $email;
	private $subject;

	public function setEmail(string $email)
	{
		$this->email = $email;
	}
	
	public function getEmail(): string
	{
		return $this->email;
	}
	
	public function setSubject(string $subject)
	{
		$this->subject = $subject;
	}
	
	public function getSubject(): string
	{
		return $this->subject;
	}
}