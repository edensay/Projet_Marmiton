<?php
namespace Core\lib;
class myPdo{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private static $_instance = null;
    
    private function __construct() {
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'marmiton';
        $this->user = 'root';
        $this->pass = '';
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        self::$_instance = new \PDO($dns, $this->user, $this->pass);
    }
    
    public static function getInstance() {
        if(is_null(self::$_instance)) {
            new myPdo();
        }
        return self::$_instance;
    }
}