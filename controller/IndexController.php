<?php

namespace controller;
use service as Service;
use model as Model;

class IndexController
{
	private function sendSMS(string $text)
	{
		$smsDTO = new Model\SmsDTO();
		$smsDTO->setMessage($text);
		$smsDTO->setPhone('+10000000000');
		
		Service\SmsService::send($smsDTO);
	}

	private function sendEmail(string $text)
	{
		$mailDto = new Model\MailDTO();
		$mailDto->setMessage($text);
		$mailDto->setEmail('someemail@mail.com');
		
		Service\MailService::send($mailDto);
	}

	public function onUserSubmit()
	{
		Service\CsrfService::csrfCheck('index');

		$userText = trim($_POST['user-text']);
		if (empty($userText)) {
			return;
		}

		$id = (int)$_POST['id'];
		
		try {
			Model\UserInput::save($userText, $id);
			$this->sendSMS($userText);
			$this->sendEmail($userText);
		} catch (\Exception $exp) {

		}
	}

	public function onPageVisit(): Model\UserInput
	{
		return Model\UserInput::get();
	}
}