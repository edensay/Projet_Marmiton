<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 02/02/2016
 * Time: 23:32
 */
require(APP.DS.'form'.DS.'BaseForm.php');
class RecetteForm extends BaseForm
{
    function __construct()
    {
        $form = array('first' => array(
            'type' => 'Text',
            'value' => 'test',
        ));
        parent::__construct($form);
    }
}