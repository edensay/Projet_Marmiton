<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/01/2016
 * Time: 22:24
 */

require '../Autoloader.php';
App\Autoloader::register();
$test = new App\indexController();
$test->test();