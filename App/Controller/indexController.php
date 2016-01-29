<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/01/2016
 * Time: 22:22
 */

/**
 * Class Autoloader
 */
namespace App {
    class indexController
    {
        public function index() {
            echo "Je suis dans la fonction index du controller indexController";
        }
        public function test() {
        	echo "Je suis dans la fonction test du controller indexController";
        }
    }
}