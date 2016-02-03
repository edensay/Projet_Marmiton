<?php
namespace App\Controller;


    class Controller
    {
        public static function dispatcher() {

        }



        public function GetFile() {
            return yaml_parse_file(__DIR__.'\App\routing.yml');
        }
    }