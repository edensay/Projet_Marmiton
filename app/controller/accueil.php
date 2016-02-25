<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
class accueil
{
    public function accueil()
    {
    	$params = array("recette1" => "test");
        return view::render('accueil', $params);
    }
    
    public function test()
    {
        $test1 = recette::getLastRecettes();
        //recette::insertCommentaire(array('id' => 1, 'nom'=> 'maltuin2', 'note'=> 4, 'commentaire'=> 'DeuxiemeCom'));
        $test2 = recette::getCommentaire(1);
        $test3 = recette::getRecette(1);
        var_dump($test3);
        return view::render('test', array("commentaires" => $test2, "recettes" => $test1, "recetteDetail" => $test3));
    }
}