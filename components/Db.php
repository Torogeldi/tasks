<?php

class Db{

	public static function getConnect(){
		$paramPath = ROOT . '/config/db_params.php';
		$params = include($paramPath);

		$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		return $db;
	}

}