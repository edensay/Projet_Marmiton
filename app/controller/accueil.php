<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
class accueil
{
    public function accueil()
    {
        $lastRecettes = recette::getLastRecettes();
        return view::render('accueil', array("Recettes" => $lastRecettes, 'image' => 'cake.png'));
    }
    
    public function resultat()
    {
        $params = array (array("tag", "1"), array("tag", "2"), array("ing", "1"));
        $resultatRecette = recette::rechercheRecette($params);
        return view::render('resultat', array("Recettes" => $resultatRecette, 'image' => 'cake.png'));
    }
    
    public function recherche()
    {
        $tags = recette::getTags();
        $ingredient = recette::getIngredients();
        return view::render('recherche', array("tags" => $tags, 'ingredients' => $ingredient));
    }
    
    public function test()
    {
        if (count($_POST) != 0) {
            var_dump($_POST);
            recette::insertCommentaire(array('id' => $_GET, 'nom'=> $_POST['pseudo'], 'note'=> $_POST['note'], 'commentaire'=> $_POST['comment']));
        }
        $i = 1;
        $test2 = recette::getCommentaire(1);
        $test3 = recette::getRecette(1);
        $test3[0]['texte'] = explode('¤', $test3[0]['texte']);
        return view::render('test', array("commentaires" => $test2, "recettes" => $test1, "recetteDetail" => $test3[0], "inc" => $i));
    }
}