<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
class form
{
    public function recetteForm()
    {
        if (count($_POST) == 0) {
            $tags = recette::getTags();
            $ingredient = recette::getIngredients();
            $volume = recette::getVols();
            $params = array("tags" => $tags, "ingredients" =>$ingredient, "volumes" => $volume);
            return view::render('recetteForm', $params);
        } else {
            var_dump($_POST);
            var_dump($_FILE);
            $params = array(
                'titre' => $_POST['nom'],
                'temps' => $_POST['temps'],
                'texte' => implode('¤', $_POST['desc']),
                'img' => $_POST['temps'],
                'date' => '',
                'ingredient' => $_POST['ingredient'],
                'unite' => $_POST['unite'],
                'quantite' => $_POST['quantite'],
                'tags' => $_POST['tags'],
            );
            recette::newRecette($params);
        }
    }
}