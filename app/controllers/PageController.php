<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 01/02/16
 * Time: 15:25
 */

/**
 * Render the pages (folder views/page)
 *
 * Class PageController
 */
class PageController extends BaseController{

    /**
     * @param string $name Name of the page
     */
    function index($name = 'Default'){
        $this->set('titrePage', 'Nom de ma page : '.$name);
        $this->set(array('nom' => $name, 'contenu' => 'paragraphe'));
        $this->render('index');
    }

}