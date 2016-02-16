<?php


namespace App\View;

class View
{

    public $view;
    public $param;

    public static function __construct($view, $param)
    {
        self::$view = $view;
        self::$param = $param;
    }


    public function render(){
        return call_user_func_array(["\\App\\View\\". $this->view,$this->param])->render();
    }


}