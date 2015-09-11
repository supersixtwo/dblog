<?php

namespace Supersixtwo\Dblog;

use Supersixtwo\Dblog\DblogModel;

class dblogClass
{
    /**
     * Create a new dblog Instance
     */
    public function __construct()
    {
        // constructor body
    }
    
    private static function saveLog($level, $message, $context) {
	    
	    $dblog = new DblogModel;
	    $dblog->level 	= $level;
	    $dblog->message	= $message;
	    $dblog->context	= json_encode($context);
	    $dblog->save();
	    
	    return true; 
    }

	public static function emergency($message, array $context = null) {
	    
	    self::saveLog('emergency', $message, $context);
	    
	    return true;
	    
	}
	
	public static function alert($message, array $context = null) {
	    
	    self::saveLog('alert', $message, $context);
	    
	    return true;
	     
	}
	
	public static function critical($message, array $context = null) {
	    
	    self::saveLog('critical', $message, $context);
	    
	    return true;
	    
	}
	
	public static function error($message, array $context = null) {
		
		self::saveLog('error', $message, $context);
	    
	    return true;
	    		
	}
	
	public static function warning($message, array $context = null) {
		
	    self::saveLog('warning', $message, $context);
	    
	    return true;		
	}
	
	public static function notice($message, array $context = null) {
		
		self::saveLog('notice', $message, $context);
	    
	    return true;
		
	}
	
	public static function info($message, array $context = null) {
		
		self::saveLog('info', $message, $context);
	    
	    return true;
		
	}
	
	public static function debug($message, array $context = null) {
		
		self::saveLog('null', $message, $context);
	    
	    return true;
		
	}

   
}
