<?php

	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	function jsonRpcFormatCheck($request) {
	//  function to check that the JSON-RPC parameters are there and correct
		$jsonrpc = $request -> jsonrpc ;
		$method = $request -> method ;
		$id = $request -> id ;
		if ( ($jsonrpc != "2.0" ) or ($method == NULL) or ($id == NULL)) {
			$return = 0 ;
		}
		else {
			$return = 1 ;
		}
		return $return ;
	} ;
	
	function checkMethodParams($method, $params) {
		switch ($method) {
			case "getAll":
        		if ($params != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			case "getAllTemp":
        		if ($params != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			case "createRecord":
				if ($params -> txt != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				}
				  break;
    		case "updateLed":
    			if ($params-> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			default :
    		// method not found
        		$return = -32601;
        	break ;
        }
        return $return ;
} 
	
?>