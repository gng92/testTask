<?php

require_once(__DIR__.'/config/bootstrap.php');

$indexController = new  controller\IndexController();

if (!empty($_POST['user-text'])) {
	$indexController->onUserSubmit();
}

$userInput = $indexController->onPageVisit();

?>

<form action="index.php" method="POST">
	<input name="user-text" placeholder="Type your text here" value="<?=!empty($userInput)?$userInput->getText():''?>">
	<input name="id" value="<?=!empty($userInput)?$userInput->getId():''?>" hidden>
	<?=service\CsrfService::csrfToken('index') ?>
	<button type="submit">Submit</button>
</form>