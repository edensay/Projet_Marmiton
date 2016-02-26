<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recupRecette;
class accueil
{
    public function accueil()
    {
        $lastRecettes = recupRecette::getLastRecettes();
        return view::render('accueil', array("Recettes" => $lastRecettes));
    }
}