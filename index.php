<?php

/**
 * @todo : install ES + index
 * @todo : config d'install install.php
 *
 */
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // pour se simplifier la vie

session_start();
require_once('vendor/autoload.php');
echo Core\controller\Controller::dispatcher();
