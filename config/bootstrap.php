<?php

define('APP_PATH', realpath(__DIR__.'/../').'/');

$paths = array(
	APP_PATH,
	get_include_path(),
);
set_include_path(implode(PATH_SEPARATOR, $paths));
function testtask__autoload($className)
{
	$filename = str_replace('\\', '/' , $className) . '.php';
	require_once $filename;
}
spl_autoload_register("testtask__autoload");