<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 02/02/2016
 * Time: 23:32
 */
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