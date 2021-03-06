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
            spl_autoload_register(array(__CLASS__, '_autoload'));
        }

        static function _autoload($class)
        {
            $dir = explode('\\', $class);
            $path = __DIR__.'/'.$dir[0];
            if(is_dir(realpath($path))) {
                $path .= '/'.$dir[1];
                if(is_dir(realpath($path))) {
                    $path .= '/'.$dir[2].'.php';
                    if(file_exists(realpath($path))) {
                        require realpath($path);
                    }
                }
            }
        }
    }
}