<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);


// Подключение файлов системы
define('ROOT', dirname(__FILE__));

function debug($a){
	echo "<pre>";
		var_dump($a);
	echo "</pre>";
}

require_once(ROOT.'/components/Autoload.php');

session_start();

// Вызов Router
$router = new Router();
$router->run();