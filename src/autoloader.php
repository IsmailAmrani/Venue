<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace src;

/**
 * Description of autoloader
 *
 * @author eaismail
 */
class autoloader {
    
    static function register() {
        spl_autoload_register([__CLASS__,'autoload']);
    }
    static function autoload($class) {
        
        if(strpos($class, __NAMESPACE__ . '\\') === 0){
	    $class = str_replace( __NAMESPACE__ . '\\', '', $class);
	    $class = str_replace('\\', '/', $class);
	    require __DIR__ .'/'. $class . '.php';
	}
    }
    
}
