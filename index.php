<?php

use App\Controller\Controller;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // pour se simplifier la vie

session_start();

require_once'App/Autoloader.php';
Autoloader::register();
Controller::dispatcher();
