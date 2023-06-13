<?php

namespace service;
use model\SmsDTO as SmsDTO;

class SmsService
{
	public static function send(SmsDTO $messageDTO)
	{
		$message = $messageDTO->getMessage();
	}
}