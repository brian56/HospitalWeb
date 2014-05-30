<?php 
class Response {
	/**
	 * Key which has to be in HTTP USERNAME and PASSWORD headers
	 */
	Const APPLICATION_ID = 'ASCCPE';
	/**
	 * Default response format
	 * either 'json' or 'xml'
	 */
	private static $format = 'json';
	private $response = array();
	
	/**
	 * Response to user that a param is missed
	 * @param string $param param's name
	 */
	public static function MissingParam($param='') {
    	$response ['status'] = Params::status_params_missing;
    	$response ['message'] = Params::message_params_missing.$param;
    	$response ['data'] = '';
    	self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    
    /**
     * Response to user that request was successful
     * @param string $model model's name
     * @param array $data data to return to user
     */
    public static function Success($model='', $data = array()) {
    	$response ['status'] = Params::status_success;
		$response ['message'] = Params::message_success . $model;
		$response ['data'] = json_decode ( self::renderJsonDeep ( $data ) );
		self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    /**
     * Response to user that request is successful, but no data to return
     * @param string $model model's name
     */
    public static function SuccessNoData($model='') {
    	$response ['status'] = Params::status_success;
		$response ['message'] = Params::message_success . $model;
		$response ['data'] = '';
		self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    /**
     * Response to user that request was failed
     * @param string $message the message
     */
    public static function Failed($message='') {
    	$response ['status'] = Params::status_failed;
    	$response ['message'] = Params::message_failed.' '.$message;
    	$response ['data'] = '';
    	self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    
    /**
     * Response to user that there's a param has invalid format
     * @param string $param param's name
     */
    public static function ParamError($param='') {
    	$response ['status'] = Params::status_params_error;
    	$response ['message'] = Params::message_params_error.$param;
    	$response ['data'] = '';
    	self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    
    /**
     * Response to user that request was proccessed successfully but no data found on server
     * @param string $model model's name
     */
    public static function NoRecord($model='') {
    	$response ['status'] = Params::status_no_record;
		$response ['message'] = Params::message_no_record . $model;
		$response ['data'] = '';
		self::_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    
    /**
     * To render a JSON string from a complicated array
     * @param unknown $o input object, usually array
     * @return  the JSON string
     */
    private static function renderJsonDeep($o) {
    	header('Content-type: application/json');
    	// if it's an array, call getAttributesDeep for each record
    	if (is_array($o)) {
    		$data = array();
    		foreach ($o as $record) {
    			array_push($data, self::getAttributesDeep($record));
    		}
    		return CJSON::encode($data);
    	} else {
    		// otherwise just do it on the passed-in object
    		return CJSON::encode( self::getAttributesDeep($o) );
    	}
    
    	// this just prevents any other Yii code from being output
    	foreach (Yii::app()->log->routes as $route) {
    		if($route instanceof CWebLogRoute) {
    			$route->enabled = false; // disable any weblogroutes
    		}
    	}
    	Yii::app()->end();
    }
    
    /**
     * Get the deep related object inside array or object
     * @param unknown $o input object, usually array
     * @return multitype:multitype:unknown
     */
    private static function getAttributesDeep($o) {
    	// get the attributes and relations
    	if(!is_array($o)) {
    		$data2 = $o->attributes;
    		$relations = $o->relations();
    		foreach (array_keys($relations) as $r) {
    			// for each relation, if it has the data and it isn't nul/
    			if ($o->hasRelated($r) && $o->getRelated($r) != null) {
    				// add this to the attributes structure, recursively calling
    				// this function to get any of the child's relations
    				$data2[$r] = self::getAttributesDeep($o->getRelated($r));
    			}
    		}
    	} else {
    		$data2 = array();
    		foreach ($o as $i) {
    			$data1 = $i->attributes;
    			$relations = $i->relations();
    			foreach (array_keys($relations) as $r) {
    				// for each relation, if it has the data and it isn't nul/
    				if ($i->hasRelated($r) && $i->getRelated($r) != null) {
    					// add this to the attributes structure, recursively calling
    					// this function to get any of the child's relations
    					$data1[$r] = self::getAttributesDeep($i->getRelated($r));
    				}
    			}
    			$data2[] = $data1;
    		}
    	}
    	return $data2;
    }
    
    /**
     * Sends the API response
    *
    * @param int $status
    * @param string $body
    * @param string $content_type
    * @access private
    * @return void
    */
    private static function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {
    	$status_header = 'HTTP/1.1 ' . $status . ' ' . self::_getStatusCodeMessage($status);
    	// set the status
    	header($status_header);
    	// set the content type
    	header('Content-type: ' . $content_type);
    
    	// pages with body are easy
    	if($body != '')
    	{
    		// send the body
    		echo $body;
    		exit;
    	}
    	// we need to create the body if none is passed
    	else
    	{
    		// create some body messages
    		$message = '';
    
    		// this is purely optional, but makes the pages a little nicer to read
    		// for your users.  Since you won't likely send a lot of different status codes,
    		// this also shouldn't be too ponderous to maintain
    		switch($status)
    		{
    			case 401:
    				$message = 'You must be authorized to view this page.';
    				break;
    			case 404:
    				$message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
    				break;
    			case 500:
    				$message = 'The server encountered an error processing your request.';
    				break;
    			case 501:
    				$message = 'The requested method is not implemented.';
    				break;
    		}
    
    		// servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
    		$signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
    
    		// this should be templatized in a real-world solution
    		$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . self::_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . self::_getStatusCodeMessage($status) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';
    
    		echo $body;
    		exit;
    	}
    } // }}}
    // {{{ _getStatusCodeMessage
    /**
     * Gets the message for a status code
     *
     * @param mixed $status
     * @access private
     * @return string
     */
    private static function _getStatusCodeMessage($status)
    {
    	// these could be stored in a .ini file and loaded
    	// via parse_ini_file()... however, this will suffice
    	// for an example
    	$codes = Array(
    			100 => 'Continue',
    			101 => 'Switching Protocols',
    			200 => 'OK',
    			201 => 'Created',
    			202 => 'Accepted',
    			203 => 'Non-Authoritative Information',
    			204 => 'No Content',
    			205 => 'Reset Content',
    			206 => 'Partial Content',
    			300 => 'Multiple Choices',
    			301 => 'Moved Permanently',
    			302 => 'Found',
    			303 => 'See Other',
    			304 => 'Not Modified',
    			305 => 'Use Proxy',
    			306 => '(Unused)',
    			307 => 'Temporary Redirect',
    			400 => 'Bad Request',
    			401 => 'Unauthorized',
    			402 => 'Payment Required',
    			403 => 'Forbidden',
    			404 => 'Not Found',
    			405 => 'Method Not Allowed',
    			406 => 'Not Acceptable',
    			407 => 'Proxy Authentication Required',
    			408 => 'Request Timeout',
    			409 => 'Conflict',
    			410 => 'Gone',
    			411 => 'Length Required',
    			412 => 'Precondition Failed',
    			413 => 'Request Entity Too Large',
    			414 => 'Request-URI Too Long',
    			415 => 'Unsupported Media Type',
    			416 => 'Requested Range Not Satisfiable',
    			417 => 'Expectation Failed',
    			500 => 'Internal Server Error',
    			501 => 'Not Implemented',
    			502 => 'Bad Gateway',
    			503 => 'Service Unavailable',
    			504 => 'Gateway Timeout',
    			505 => 'HTTP Version Not Supported'
    					);
    
    	return (isset($codes[$status])) ? $codes[$status] : '';
    } // }}}
    // {{{ _checkAuth
    /**
     * Checks if a request is authorized
     *
     * @access private
     * @return void
     */
    private static function _checkAuth()
    {
    	// Check if we have the USERNAME and PASSWORD HTTP headers set?
    	if(!(isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME']) and isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD']))) {
    		// Error: Unauthorized
    		self::_sendResponse(401);
    	}
    	$username = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME'];
    	$password = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD'];
    	// Find the user
    	$user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
    	if($user===null) {
    		// Error: Unauthorized
    		self::_sendResponse(401, 'Error: User Name is invalid');
    	} else if(!$user->validatePassword($password)) {
    		// Error: Unauthorized
    		self::_sendResponse(401, 'Error: User Password is invalid');
    	}
    } // }}}
    // {{{ _getObjectEncoded
    /**
     * Returns the json or xml encoded array
     *
     * @param mixed $model
     * @param mixed $array Data to be encoded
     * @access private
     * @return void
     */
    private static function _getObjectEncoded($model, $array)
    {
    	if(isset($_GET['format']))
    		self::$format = $_GET['format'];
    
    	if(self::format=='json')
    	{
    		return CJSON::encode($array);
    	}
    	elseif(self::format=='xml')
    	{
    		$result = '<?xml version="1.0">';
    		$result .= "\n<$model>\n";
    		foreach($array as $key=>$value)
    			$result .= "    <$key>".utf8_encode($value)."</$key>\n";
    		$result .= '</'.$model.'>';
    		return $result;
    	}
    	else
    	{
    	return;
    	}
    }
}
?>