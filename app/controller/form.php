<?php
namespace Core\Controller;

use Core\view\view;
class form
{
    public function recetteForm()
    {
    	$params = array("recette1" => "test");
        return view::render('recetteForm', $params);
    }
}