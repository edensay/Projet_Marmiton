<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/02/16
 * Time: 15:25
 */
/**
 * Class BaseController
 */
class BaseController{

    /**
     * @var object Request
     */
    public $request;

    /**
     * @var array Content sent to the page
     */
    private $content = array();

    /**
     * @var bool If the page has already been rendered
     */
    private $rendered = false;

    function __construct($request){
        $this->request = $request;
    }

    /**
     * Render the page
     *
     * @param string $viewName Nom de la vue à afficher
     * @return bool Display the page
     */
    public function render($viewName){
        if($this->rendered){ return false; }
        extract($this->content);
        if(strpos($viewName, DS) === 0){ // On regarde si il s'agit de 404.php
            $view = APP.DS.'views'.$viewName.'.php';
        }else{
            $view = APP.DS.'views'.DS.$this->request->controller.DS.$viewName.'.php';
        }
        require($view); // Insertion de la vue dans index.php
        $this->rendered = true; // Evite d'avoir la page en dupliquée lors d'appel directe dans le contrôleur enfant
    }

    /**
     * Add the parameter to the list of parameters sent to the page
     *
     * @param string|array $key Parameters to the page
     * @param string|null $value Value of the single parameter
     */
    public function set($key, $value=null){
        if(is_array($key)){ // Permet de récupérer directement un tableau des paramètres
            $this->content += $key;
        }else if(isset($value)){ // Ou récupérer un clé valeur
            $this->content[$key] = $value;
        }
    }
}