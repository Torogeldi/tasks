<?php

/**
* Router
*/
class Router
{
	private $routes;

	public function __construct(){
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	private function getURI(){
		
		if ( !empty($_SERVER['REQUEST_URI']) ) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public static function errorCode($code) {
		http_response_code($code);
		$path = ROOT.'app/views/404/error/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function run(){

		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			if ( preg_match("~$uriPattern~", $uri) ) {
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$segments = explode("/", $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;
				if ($parameters[0] == "") {
					$parameters[0] = "id";
				}

				$controllerFile = ROOT.'/app/controllers/'.$controllerName.'.php';

				if ( file_exists($controllerFile) ) {
					include_once($controllerFile);
				}else{
					self::errorCode(404);
				}

				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null) {
					break;
				}else{
					self::errorCode(404);
				}
			}

		}

	}
}