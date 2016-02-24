<?php
namespace Core\Controller;

use Core\lib\Spyc;
class Controller
{
    public static function dispatcher()
    {
        return self::getRoute(self::getFile());
    }


    private function getFile()
    {
        return Spyc::YAMLLoad(__DIR__ . '/routing.yml');
    }

    private function getRoute($routes)
    {
        if ($_SERVER['REQUEST_URI'] == '/') {
            return call_user_func('\Core\controller\accueil::accueil');
        }
        foreach($routes as $route){
            if($route['path'] == $_SERVER['REQUEST_URI']){
                return call_user_func($route['controller']);
            }
        }
        return call_user_func('Core\controller\erreur::erreur404');
    }

}