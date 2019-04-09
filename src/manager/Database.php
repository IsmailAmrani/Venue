<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace src\manager;

use PDO;

/**
 * Description of Database
 *
 * @author eaismail
 */
class Database {
    
    private $_connection;
    private static $_instance;
    
    private static $DATA = null;
    
    /**
     * @return array
     * @throws Exception
     */
    public static function getConfig($section = null) 
    {
        if ($section === null) {
            return self::getData();
        }
        $data = self::getData();
        if (!array_key_exists($section, $data)) {
            throw new Exception('Unknown config section: ' . $section);
        }
        return $data[$section];
    }
    
    /**
     * @return array
     */
    private static function getData() {
        if (self::$DATA !== null) {
            return self::$DATA;
        }
        self::$DATA = parse_ini_file('../app/config/parametrs.ini', true);
        return self::$DATA;
    }
        
    public static function getInstance() {
	if(!self::$_instance) { 
	    self::$_instance = new self();
	}
	return self::$_instance;
    }
	
    private function __construct() {
        
        $config = self::getConfig('database');
        try {
            $this->_connection = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['user'], $config['password']);
            $this->_connection->exec("SET CHARACTER SET utf8");
        }catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
		
    }
	
    public function getConnection() {
         return $this->_connection;
    }
        
    public function prepare($sql)
    {
        return $this->_connection->prepare($sql);
    }
    
}
