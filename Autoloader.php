<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/01/2016
 * Time: 22:22
 */

namespace App {
    class Autoloader
    {
        static function register()
        {
            spl_autoload_register(array(__CLASS__, '_autoloadController'));
            spl_autoload_register(array(__CLASS__, '_autoloadModel'));
            spl_autoload_register(array(__CLASS__, '_autoloadView'));
        }

        static function _autoloadController($class) {
            $dir = explode('\\', $class);
            $path = __DIR__ ."/".$dir[0];

            if(is_dir(realpath($path))) {
                if(strpos($dir[1], 'Controller')) {
                    $path .= "/Controller/".$dir[1].'.php';

                    if (file_exists($path)) {
                        require_once(realpath($path));
                    } else {
                        echo "Le fichier ${dir[1]} n'existe pas dans le namespace ${dir[0]}";
                        return true;
                    }
                } else {
                    return false;
                }
            } else {
                echo "Le Namespace ${dir[0]} n'existe pas !";
                return true;
            }
        }

        static function _autoloadModel($class) {
            $dir = explode('\\', $class);
            $path = __DIR__ ."/".$dir[0];

            if(strpos($dir[1], 'Model')) {
                $path .= "/Model/".$dir[1].'.php';

                if (file_exists($path)) {
                    require_once(realpath($path));
                } else {
                    echo "Le fichier ${dir[1]} n'existe pas dans le namespace ${dir[0]}";
                    return true;
                }
            } else {
                return false;
            }
        }

        static function _autoloadView($class) {
            $dir = explode('\\', $class);
            $path = __DIR__ ."/".$dir[0];
            
            if(strpos($dir[1], 'View')) {
                $path .= "/View/".$dir[1].'.php';

                if (file_exists($path)) {
                    require_once(realpath($path));
                } else {
                    echo "Le fichier ${dir[1]} n'existe pas dans le namespace ${dir[0]}";
                    return true;
                }
            } else {
                return false;
            }
        }
    }
}