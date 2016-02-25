<?php
namespace Core\Controller;

use Core\view\view;
class recette
{
    public function allRecette()
    {
     $params = array("recette1" => "test");
        return view::render('allRecette', $params);
    }
}