<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/01/2016
 * Time: 22:24
 */

require 'Autoloader.php';
App\Autoloader::register();
$uri = preg_split('@/@', $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);;
if (count($uri) > 0) {
	$classname = 'App\\Controller\\'.$uri[0].'Controller';
	$controller = new $classname();
	if(isset($uri[1])) {
		if(method_exists($controller, $uri[1])) {
			$controller->$uri[1]();
			return;
		} else {
			echo "La fonction ${uri[1]} n'existe pas dans le controller ${uri[0]}!";
		}
	} else {
		$controller->index();
	}
} else {
	$controller = new App\Controller\indexController();
	$controller->index();
}