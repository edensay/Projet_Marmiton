<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/02/16
 * Time: 15:21
 */
class Dispatcher{
    var $request;
    var $controller;

    function __construct(){
        $this->request = new Request(); // Récupération de l'URL saisie
        Router::parse($this->request->url, $this->request); // Parsing de l'URL pour récupérer les paramètres
        $this->loadController();
    }

    /**
     * Load automatically the controller
     */
    private function loadController()
    {
        // Si aucun contrôleur n'est trouvé, on utilise le contrôleur de base
        if (empty($this->request->controller))
        {
            $this->request->controller = 'Base';
        }
        $nameController = ucfirst($this->request->controller) . 'Controller';
        $file = APP.DS.'controllers'.DS.$nameController.'.php';
        // Si le contrôleur n'est pas trouvé, on affiche une erreur 404, sinon on charge le contrôleur
        if(file_exists($file)){
            require_once $file;
        }else{
            $this->error('Le contrôleur '.$this->request->controller.' n\'existe pas.');
        }
        // Initialisation du contrôleur
        $controller = new $nameController($this->request);

        // Si le contrôleur ne contient pas la méthode appelé, on affiche une erreur 404
        if(!in_array($this->request->action, get_class_methods($controller))){
            $this->error('Le contrôleur '.$this->request->controller.' n\'a pas de fonction '.$this->request->action);
        }

        // On appel la fonction du contrôleur
        call_user_func_array(array($controller, $this->request->action), $this->request->params); // Permet d'appeler une fonction avec un nom dynamique
        // $controller->render($this->request->action); // Permet d'appeler la page directement sans paramètres
    }

    /**
     * Error handler
     *
     * @param null $message Message to set to the users
     */
    private function error($message = null){
        header('HTTP/1.0 404 Not Found');
        $controller = new BaseController($this->request);
        if(isset($message)){
            $controller->set('message', $message);
        }
        $controller->render(DS.'errors'.DS.'404');
        die();
    }
}