<?php

namespace Core\model;

use Curl\Curl;
use Exception;

/**
 * Class elastic
 * @package Core\model
 */
Class elastic {

    private $settings = [];
    private static $_instance;

    /**
     * @param $settings
     * @return elastic
     */
    public static function getInstance($settings)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new elastic($settings);
        }
        return self::$_instance;
    }

    /**
     * elastic constructor.
     * @param $settings
     */
    private function __construct($settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return string
     * @throws Exception
     */
    private function getUrl(){
        if(isset($this->settings['protocol'])
        && isset($this->settings['domain'])
        && isset($this->settings['index'])
        && isset($this->settings['node'])){
            return $this->settings['protocol'] .'://'.$this->settings['domain'].'/'. $this->settings['index'] . '/' . $this->settings['node'];
        }
        else {
            throw new Exception('Les informations de connections sont incorrect');
        }

    }

    /**
     * @param $id
     * @param array $args
     * @throws Exception
     */
    public function get($id, $args = []){
        $curl = new Curl();
        $curl->get($this->getUrl().'/'.$id, $args);
    }





}
