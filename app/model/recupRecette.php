<?php
namespace Core\model;
use Core\lib\myPdo;

class recupRecette
{
    public function getLastRecettes()
    {
        $PDO = myPdo::getInstance();
        $res = $PDO->query('SELECT idr, titre, img FROM recettes ORDER BY idr DESC LIMIT 6');
        return $res->fetchAll();
    }
    
    public function getIngredients()
    {
        $PDO = myPdo::getInstance();
        $res = $PDO->query('SELECT idil, nom FROM ingredientListe');
        return $res->fetchAll();
    }
    
    public function getTags()
    {
        $PDO = myPdo::getInstance();
        $res = $PDO->query('SELECT idt, nom FROM tagList');
        return $res->fetchAll();
    }
    
    public function getVols()
    {
        $PDO = myPdo::getInstance();
        $res = $PDO->query('SELECT idv, volume FROM volumeListe');
        return $res->fetchAll();
    }
    
    public function getCommentaire($id)
    {
        $PDO = myPdo::getInstance();
        $sql = $PDO->prepare('select * from commentaires WHERE idr = :id');
        $sql->execute(array(':id' => $id));
        return $sql->fetchAll();
    }
    
    public function getRecette($id)
    {
        $PDO = myPdo::getInstance();
        $PDO->exec("SET CHARACTER SET utf8");
        $query = "SELECT R.idr, R.titre, R.temps, R.texte, R.img ,
                    (SELECT GROUP_CONCAT( B.nom SEPARATOR  ', ' ) FROM ingredients A LEFT JOIN ingredientListe B ON A.idi = B.idil WHERE idr = :id ) AS ingredients,
                    (SELECT GROUP_CONCAT( quantité SEPARATOR  ', ' ) FROM ingredients WHERE idr = :id) AS quantites,
                    (SELECT GROUP_CONCAT( B.nom SEPARATOR  ', ' ) FROM tags A LEFT JOIN tagList B ON A.idt = B.idt WHERE idr = :id ) as tags
                    FROM recettes R
                    WHERE idr = :id";
        $recette = $PDO->prepare($query);
        $recette->execute(array(':id' => $id));
        return $recette->fetchAll();
    }
    
    public function rechercheRecette($tags, $ings, $titre = "") {
        $PDO = myPdo::getInstance();
        $temp = "";
        $query = "SELECT R.idr, R.titre, R.img,(";
        $bool = 0;
        var_dump($tags);
        foreach($tags as $tag)
        {
            is_int($tag) ? $temp .= "( SELECT COUNT(*)  FROM tags WHERE idt = $tag AND idr = R.idr)" :'';
        }
        foreach($ings as $ing)
        {
            is_int($tag) ? $temp .= "+ ( SELECT COUNT(*)  FROM ingredients WHERE idi = $ing AND idr = R.idr)" :'';
        }
        $temp == "" ? $temp = "0" : '';
        $query .= $temp;
        $query .= ") AS count FROM recettes R WHERE $temp >= ".round(count($params)/3);
        $query .= $titre != " " ? " AND titre LIKE '%$titre%'":'';
        $query .= " ORDER BY count DESC";
        return $PDO->query($query)->fetchAll();
    }
}