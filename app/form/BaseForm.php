<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 02/02/2016
 * Time: 22:45
 */
class BaseForm {
    private $name;
    private $value;
    public $surround = 'p';
    private $form;

    public function __construct($datas) {
        $form = '<form>';
        foreach ($datas as $key => $data) {
            $this->name = $key;
            $this->value = isset($data['value'])?$data['value']:'';
            $funcname ="input{$data['type']}";
            if(method_exists($this, $funcname)) {
                $form .=  $this->$funcname();
            } else {
                return '<p> Erreur lors de la creation du formulaire</p>';
            }
        }
        $this->form = $form.$this->submit().'</form>';
    }

    public function surround($val) {
        return "<{$this->surround}>$val</{$this->surround}>";
    }

    public function inputText() {
        return $this->surround("<input type='text' name='{$this->name}' value='{$this->value}'>");
    }

    public function submit() {
        return $this->surround("<button type='submit'> Valider </button>");
    }

    public function render() {
        return $this->form;
    }
}