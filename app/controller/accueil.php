<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
class accueil
{
    public function accueil()
    {
    	$params = array("recette1" => "test");
    	recette::toto();
        return view::render('accueil', $params);
    }
}