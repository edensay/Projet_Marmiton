<?php


namespace Core\model;

use Core\lib\myPdo;

class recette
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
    
    public function insertCommentaire($params)
    {
        $PDO = myPdo::getInstance();
        $sql = $PDO->prepare('INSERT INTO commentaires VALUES(:id, :nom, :note,:commentaire)');
        $sql->execute(array(':id' => $params['id'], ':nom' => $params['nom'], ':note' => $params['note'], ':commentaire' => $params['commentaire']));
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
    
    public function newRecette($params)
    {
        $PDO = myPdo::getInstance();
        $PDO->exec("SET CHARACTER SET utf8");
        $queryInsert = "INSERT INTO recettes VALUES('', :titre, :temps, :texte, :img, :date)";
        $insert = $PDO->prepare($queryInsert);
        $insert->execute(array(
            ':titre' => $params['titre'],
            ':temps' => $params['temps'],
            ':texte' => $params['texte'],
            ':img' => $params['img'],
            ':date' => $params['date'])
        );
        
        $idr = $PDO->query('SELECT idr FROM recettes ORDER BY idr DESC LIMIT 1');
        $idr = $idr->fetchAll();
        for($i = 0; $i < count($params['ingredient']); $i++) {
            $queryInsert = "INSERT INTO ingredients VALUES(:idr, :idi, :idv, :quantite)";
            $insert = $PDO->prepare($queryInsert);
            $insert->execute(array(
                ':idr' => $idr[0]['idr'],
                ':idi' => $params['ingredient'][$i],
                ':idv' => $params['unite'][$i],
                ':quantite' => $params['quantite'][$i],
                )
            );
        }
        
        foreach ($params['tags'] as $tag) {
            $queryInsert = "INSERT INTO tags VALUES(:idr, :idt)";
            $insert = $PDO->prepare($queryInsert);
            $insert->execute(array(
                ':idr' => $idr[0]['idr'],
                ':idt' => $tag,
                )
            );
        }
    }
    
    public function rechercheRecette($params = array(), $titre = "") {
        $PDO = myPdo::getInstance();
        $query = "SELECT R.idr, R.titre, R.img,(";
        $bool = 0;
        if (count($params) != 0)
        {
            foreach ($params as $param) {
                if($bool) {
                    $query .= " + ";
                }
                if ($param[0] == 'tag') {
                    $query .= "( SELECT COUNT(*)  FROM tags WHERE idt = ".$param[1]." AND idr = R.idr)";
                } elseif ($param[0] == 'ing') {
                    $query .= "+ ( SELECT COUNT(*)  FROM ingredients WHERE idi = ".$param[1]." AND idr = R.idr)";
                }
                $bool = 1;
            }
        } else {
            $query .= "0";
        }
        $query .= ") AS count FROM recettes R WHERE 1" . $titre ." ORDER BY count DESC";
        return $PDO->query($query)->fetchAll();
    }
}