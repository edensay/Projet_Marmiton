<?php


define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // pour se simplifier la vie

phpinfo(); die();
session_start();

require_once'app/Autoloader.php';
Autoloader::register();
App\Controller\Controller::dispatcher();
