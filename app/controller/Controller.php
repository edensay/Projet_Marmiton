<?php
namespace App\Controller;


class Controller
{
    public static function dispatcher()
    {
        $debug = 1;
        return self::getRoute(self::getFile());
    }


    private function getFile()
    {
        return yaml_parse_file(__DIR__ . '\App\routing.yml');
    }

    private function getRoute($file)
    {
        $debug = 1;
    }

}