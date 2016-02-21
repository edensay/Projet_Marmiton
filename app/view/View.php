<?php


namespace App\View;


class View
{


    public static function render($template, $datas){

        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('view/templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => 'cache',
        ));
        print $twig->render('index.twig',
            [
                'header' => '',
                'content' => '',
                'footer' => '',
            ]
        );







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