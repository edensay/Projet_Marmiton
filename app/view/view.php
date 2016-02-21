<?php
namespace Core\view;

use Twig_Environment;
use Twig_Loader_Filesystem;

class view
{


    public static function render($template, $datas){
        \Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem(ROOT.'app/view/templates');
        $twig = new Twig_Environment($loader, array(
            //'cache' => 'cache', l'emplacement de la génération de cache
        ));



        $header = $twig->render('header.twig', []);
        $content = $twig->render($template.'.twig', $datas);
        $footer = $twig->render('footer.twig', []);

        print $twig->render('index.twig',
            [
                'header' => $header,
                'content' => $content,
                'footer' => $footer,
            ]
        );


    }

}