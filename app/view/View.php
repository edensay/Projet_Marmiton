<?php


namespace App\View;

class View
{


    public static function render($template, $datas){
        if (file_exists(ROOT.'/app/view/'.$template.'.php')) {
            extract($datas);
            ob_start();
            require ROOT.'/app/view/templates/header.php';
            require ROOT.'/app/view/templates/'.$template.'.php';
            require ROOT.'/app/view/templates/footer.php';
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$template' introuvable");
        }
    }

}