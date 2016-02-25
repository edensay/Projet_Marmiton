<?php


namespace Core\model;

use Core\lib\myPdo;

class recette
{
    public function toto()
    {

        $query = myPdo::getInstance();
        $query->query('select * from recette');
        var_dump($query);
    }
}