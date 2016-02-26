<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
class recettec
{
    public function renderRecette()
    {
        // test $_GET !
        $recettes = recette::getRecette($_GET);
        return view::render('renderRecette', array("recettes" => $recettes[0]));
    }
}