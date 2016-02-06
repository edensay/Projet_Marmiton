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
        return new Spyc(__DIR__ . '\App\routing.yml');
        return yaml_parse_file(__DIR__ . '\App\routing.yml');
    }

    private function getRoute($file)
    {
        $debug = 1;
    }

}