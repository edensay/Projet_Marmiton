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



        $header = $twig->render('region/header.twig', []);
        $content = $twig->render('page/'.$template.'.twig', $datas);
        $footer = $twig->render('region/footer.twig', []);

        print $twig->render('index.twig',
            [
                'header' => $header,
                'content' => $content,
                'footer' => $footer,
            ]
        );


    }

}