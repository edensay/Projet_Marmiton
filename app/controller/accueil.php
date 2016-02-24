<?php
namespace Core\Controller;

use Core\view\view;
class accueil
{
    public function accueil()
    {
    	$params = array("recette1" => "test");
        return view::render('accueil', $params);
    }
}