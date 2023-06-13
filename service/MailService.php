<?php

namespace service;
use model\MailDTO as MailDTO;

class MailService
{
	public static function send(MailDTO $messageDTO)
	{
		$message = $messageDTO->getMessage();
	}
}