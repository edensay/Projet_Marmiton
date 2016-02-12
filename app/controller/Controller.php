<?php
namespace App\Controller;

use App\lib\Spyc;
class Controller
{
    public static function dispatcher()
    {
        $debug = 1;
        return self::getRoute(self::getFile());
    }


    private function getFile()
    {
        return Spyc::YAMLLoad(__DIR__ . '/routing.yml');
    }

    private function getRoute($routes)
    {
        foreach($routes as $route){
            if($route['path'] == $_SERVER['REQUEST_URI']){
                $controller = explode('::', $route['controller']);
                return call_user_func($route['controller']);
            }
        }
        return call_user_func('\app\controller\erreur::erreur404');
    }

}