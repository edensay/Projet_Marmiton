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
    class Autoloader
    {
        /**
         * Enregistre notre autoloader
         */
        static function register()
        {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        /**
         * Inclue le fichier correspondant à notre classe
         * @param $class string Le nom de la classe à charger
         */
        static function autoload($class)
        {
            $delimiter = '\\';
            $dir = explode('\\', $class);
            if(is_dir(__DIR__ . $delimiter .$delimiter.$dir[0])) {
                $files = explode('_', preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", $dir[1]));
                echo __DIR__ . $delimiter .$delimiter.$dir[0].$delimiter.$files[1].$delimiter.$files[0];
                if(__DIR__ . $delimiter .$delimiter.$dir[0].$delimiter.$files[1].$delimiter.$files[0]) {

                } else {

                }
            } else {
                echo 'test';
            }

            //echo __DIR__ . '\\..\\' . $class . '.php';
            //require __DIR__ . '\\..\\' . $class . '.php';
        }
    }
}