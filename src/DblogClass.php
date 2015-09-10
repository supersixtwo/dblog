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

	public static function emergency() {
	    
	    $level = 'emergency';
	    
	}
	
	public static function alert() {
	    
	    $level = 'alert'; 
	     
	}
	
	public static function critical() {
	    
	    $level = 'critical';
	    
	}
	
	public static function error() {
		
		$level = 'error';
		
	}
	
	public static function warning() {
		
		$level = 'warning';
		
	}
	
	public static function notice() {
		
		$level = 'notice';
		
	}
	
	public static function info() {
		
		$level = 'info';
		
	}
	
	public static function debug() {
		
		$level = 'debug';
		
	}

   
}
