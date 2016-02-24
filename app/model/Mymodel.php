<?php


namespace Core\model;

use Core\lib\NoobyPDO;

class Model4FuckYou
{


    public function __construct()
    {
    }

    public function toto()
    {

        $query = NoobyPDO::getInstance();
        $query->query('select * from fuck');
        $query->query();

    }


}