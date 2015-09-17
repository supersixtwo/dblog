<?php

namespace Supersixtwo\Dblog;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Supersixtwo\Dblog\DBlogModel;

class DBlogClass
{
    
    /**
     * Common function to save log files
     *
     * @param string $level RFC 5424 level name 
     * @param string $message log or error message
     * @param array $context contextual information about message
     * 
     * @return true
     */
    
    private static function saveLog($level_id, $level, $message, $context) {
	    
	    // instantiate the log model
	    $dblog = new DBlogModel;
	    
	    // add items to object
	    $dblog->level_id			= $level_id;
	    $dblog->level_description 	= $level;
	    $dblog->message				= $message;
	    $dblog->context				= json_encode($context);
	    
	    // save the model
	    $dblog->save();
	    
	    return true; 
    }
    
    /**
     * Log an RFC 5424 Level 0 'emergency' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */

	public static function emergency($message, array $context = null) {
	    
	    self::saveLog(0, 'emergency', $message, $context);
	    
	    return true;
	    
	}
	
	/**
     * Log an RFC 5424 Level 1 'alert' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function alert($message, array $context = null) {
	    
	    self::saveLog(1, 'alert', $message, $context);
	    
	    return true;
	     
	}
	
	/**
     * Log an RFC 5424 Level 2 'critical' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function critical($message, array $context = null) {
	    
	    self::saveLog(2, 'critical', $message, $context);
	    
	    return true;
	    
	}
	
	/**
     * Log an RFC 5424 Level 3 'error' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function error($message, array $context = null) {
		
		self::saveLog(3, 'error', $message, $context);
	    
	    return true;
	    		
	}
	
	/**
     * Log an RFC 5424 Level 4 'warning' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function warning($message, array $context = null) {
		
	    self::saveLog(4, 'warning', $message, $context);
	    
	    return true;
	    		
	}
	
	/**
     * Log an RFC 5424 Level 5 'notic' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function notice($message, array $context = null) {
		
		self::saveLog(5, 'notice', $message, $context);
	    
	    return true;
		
	}
	
	/**
     * Log an RFC 5424 Level 6 'info' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function info($message, array $context = null) {
		
		self::saveLog(6, 'info', $message, $context);
	    
	    return true;
		
	}
	
	/**
     * Log an RFC 5424 Level 7 'debug' message
     *
     * @param string $message Log or error message.
     * @param array $context Array of Contextual information about message
     *
     * @return true
     */
	
	public static function debug($message, array $context = null) {
		
		self::saveLog(7, 'null', $message, $context);
	    
	    return true;
		
	}

   
}
