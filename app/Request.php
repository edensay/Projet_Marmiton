<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/02/16
 * Time: 15:19
 */
class Request {
    public $url;

    function __construct(){
        $this->url = str_replace(BASE_URL.DS, "", $_SERVER['REQUEST_URI']); // $_SERVER['PATH_INFO'];
    }
}