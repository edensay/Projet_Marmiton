<?php
namespace Core\Controller;

use Core\view\view;
use Core\model\recupRecette;
use Core\model\recette;
class form
{
    public function recetteForm()
    {
        if (count($_POST) == 0) {
            $tags = recupRecette::getTags();
            $ingredient = recupRecette::getIngredients();
            $volume = recupRecette::getVols();
            $params = array("tags" => $tags, "ingredients" =>$ingredient, "volumes" => $volume);
            return view::render('recetteForm', $params);
        } else {
            $fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
            if ($fileTmpLoc) {
			    $fileName = $_FILES["uploaded_file"]["name"];
    			$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
    			$fileType = $_FILES["uploaded_file"]["type"];
    			$fileSize = $_FILES["uploaded_file"]["size"];
    			$fileErrorMsg = $_FILES["uploaded_file"]["error"];
    			$kaboom = explode(".", $fileName);
    			$fileExt = end($kaboom);

    			if (!$fileTmpLoc) {
    				$_SESSION['error'] = "ERROR: Please browse for a file before clicking the upload button.";
    				exit();
    			}
    			else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {  
    				$_SESSION['error'] = "ERROR: Your image was not .gif, .jpg, or .png.";
    				unlink($fileTmpLoc);
    				exit();
    			}
    			$filename = $_POST['nom'].'_'.$fileName;
    			var_dump(ROOT."public/img/$filename");
    			$moveResult = move_uploaded_file($fileTmpLoc, ROOT."public/img/$filename");
    
    			if ($moveResult != true) {
    				$_SESSION['error'] = "ERROR: File not uploaded. Try again.";
    				unlink($fileTmpLoc);
    				exit();
    			}
    			//unlink($fileTmpLoc);
            }
            $_POST['tags'] = isset($_POST['tags']) ? $_POST['tags'] : array();
            $params = array(
                'titre' => $_POST['nom'],
                'temps' => $_POST['temps'],
                'texte' => implode('¤', $_POST['desc']),
                'img' => $filename,
                'date' => '',
                'ingredient' => $_POST['ingredient'],
                'unite' => $_POST['unite'],
                'quantite' => $_POST['quantite'],
                'tags' => $_POST['tags'],
            );
            if (count(recupRecette::rechercheRecette($_POST['tags'], $_POST['ingredient'], $_POST['nom'])) > 0)
            {
                //envoi du mail
            } else {
                recette::newRecette($params);
            }
        }
    }
}