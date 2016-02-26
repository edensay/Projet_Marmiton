<?php


namespace Core\model;

use Core\lib\myPdo;

class recette
{
    public function insertCommentaire($params)
    {
        $PDO = myPdo::getInstance();
        $sql = $PDO->prepare('INSERT INTO commentaires VALUES(:id, :nom, :note,:commentaire)');
        $sql->execute(array(':id' => $params['id'], ':nom' => $params['nom'], ':note' => $params['note'], ':commentaire' => $params['commentaire']));
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
}