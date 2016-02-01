<?php
class Router{
    /**
     * @param $url Url to parse
     */
    public static function parse($url, $request){
        $url = trim($url, '/'); // Retirer les / au début et à la fin de l'URL
        $url_params = explode('/', $url);
        $request->controller = $url_params[0];
        $request->action = isset($url_params[1]) ? $url_params[1] : 'index';
        $request->params = array_slice($url_params, 2); // Récupére tous les paramètres de l'URL (à partir du troisième) dans un tableau
    }
}