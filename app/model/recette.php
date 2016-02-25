<?php


namespace Core\model;

use Core\lib\myPdo;

class recette
{
    public function getLastRecettes()
    {
        $PDO = myPdo::getInstance();
        $res = $PDO->query('SELECT titre, img FROM recettes ORDER BY idr DESC LIMIT 6');
        return $res->fetchAll();
    }
    
    public function getCommentaire($id)
    {
        $PDO = myPdo::getInstance();
        $sql = $PDO->prepare('select * from commentaires WHERE idr = :id');
        $sql->execute(array(':id' => $id));
        return $sql->fetchAll();
    }
    
    public function insertCommentaire($params)
    {
        $PDO = myPdo::getInstance();
        $sql = $PDO->prepare('INSERT INTO commentaires VALUES(:id, :nom, :note,:commentaire)');
        $sql->execute(array(':id' => $params['id'], ':nom' => $params['nom'], ':note' => $params['note'], ':commentaire' => $params['commentaire']));
    }
    
    public function getRecette($id)
    {
        $PDO = myPdo::getInstance();
        $recette = $PDO->prepare("SELECT titre, temps texte, img ,
                                    (SELECT GROUP_CONCAT( B.nom
                                        SEPARATOR  ', ' ) 
                                        FROM ingredients A
                                        LEFT JOIN ingredientListe B ON A.idi = B.idil
                                        WHERE idr = 1
                                    ) AS ingredients,
                                    (SELECT GROUP_CONCAT( quantité
                                        SEPARATOR  ', ' ) 
                                        FROM ingredients
                                        WHERE idr = 1
                                    ) AS quantités,
                                    (SELECT GROUP_CONCAT( B.nom
                                        SEPARATOR  ', ' ) 
                                        FROM tags A
                                        LEFT JOIN tagList B ON A.idt = B.idt
                                        WHERE idr = :id
                                    ) as tags
                                    FROM recettes
                                    WHERE idr = 1");
        $recette->execute(array(':id' => $id));
        var_dump($recette->fetchAll());
        return $recette->fetchAll();
    }
}