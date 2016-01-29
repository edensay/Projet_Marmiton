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
            $dir = explode('\\', $class);
            $path = __DIR__ ."/".$dir[0];
            if(is_dir(realpath($path))) {
                $files = explode('_', preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", $dir[1]));
                $path .= "/".$files[1]."/".$dir[1].'.php';
                if(file_exists(realpath($path))) {
                    require_once(realpath($path));
                } else {
                    echo "Le fichier $dir[1] n'existe pas dans le namespace $dir[0]";
                    exit();
                }
            } else {
                echo "Le Namespace $dir[0] n'existe pas !";
                exit();
            }
        }
    }
}