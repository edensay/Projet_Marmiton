<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recette;
use Core\model\recupRecette;
class recettec
{
    public function renderRecette()
    {
        if (count($_POST) != 0) {
            recette::insertCommentaire(array('id' => $_GET, 'nom'=> $_POST['pseudo'], 'note'=> $_POST['note'], 'commentaire'=> $_POST['comment']));
        }
        $commentaire = recupRecette::getCommentaire($_GET);
        $detail = recupRecette::getRecette($_GET);
        $detail[0]['texte'] = explode('¤', $detail[0]['texte']);
        $detail[0]['ingredients'] = explode(',', $detail[0]['ingredients']);
        $detail[0]['quantites'] = explode(',', $detail[0]['quantites']);
        $detail[0]['volumes'] = explode(',', $detail[0]['volumes']);
        $count = count($detail[0]['ingredients']) -1;
        return view::render('test', array("commentaires" => $commentaire, "recettes" => $test1, "recetteDetail" => $detail[0], "inc" => 1, "end" => $count));
    }
    
    public function resultat()
    {
        $ing = $_POST['ingredient'];
        $tag = $_POST['tag'];
        $resultatRecette = recupRecette::rechercheRecette($tag, $ing, isset($_POST['titre']) ? $_POST['titre']:'');
        return view::render('resultat', array("Recettes" => $resultatRecette, 'image' => 'cake.png'));
    }
    
    public function recherche()
    {
        $tags = recupRecette::getTags();
        $ingredient = recupRecette::getIngredients();
        return view::render('recherche', array("tags" => $tags, 'ingredients' => $ingredient));
    }
}