<?php
class UserController extends Controller {
	// Members
	/**
	 * Key which has to be in HTTP USERNAME and PASSWORD headers
	 */
	Const APPLICATION_ID = 'ASCCPE';
	private $modelName = 'User';
	/**
	 * Default response format
	 * either 'json' or 'xml'
	 */
	private $format = 'json';
	private $with = array();
	private $response = array();
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array ();
	}
	public function responseMissingParam($param) {
    	$response ['status'] = Params::status_params_missing;
    	$response ['message'] = Params::message_params_missing.$param;
    	$response ['data'] = '';
    	$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    public function responseSuccess($model, $data) {
    	$response ['status'] = Params::status_success;
		$response ['message'] = Params::message_success . $model;
		$response ['data'] = json_decode ( $this->renderJsonDeep ( $data ) );
		$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    public function responseSuccessNoData($model) {
    	$response ['status'] = Params::status_success;
		$response ['message'] = Params::message_success . $model;
		$response ['data'] = '';
		$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    public function responseFailed($message) {
    	$response ['status'] = Params::status_failed;
    	$response ['message'] = Params::message_failed.' '.$message;
    	$response ['data'] = '';
    	$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    public function responseParamError($param) {
    	$response ['status'] = Params::status_params_error;
    	$response ['message'] = Params::message_params_error.$param;
    	$response ['data'] = '';
    	$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    public function responseNoRecord($model) {
    	$response ['status'] = Params::status_no_record;
		$response ['message'] = Params::message_no_record . $model;
		$response ['data'] = '';
		$this->_sendResponse ( 200, CJSON::encode ( $response ) );
    }
    
    
	/**
	 * get all User from database
	 */
	public function actionGetAll() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET[Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET[Params::param_Order];
		}
		
		$criteria->with = array('hospital','userLevel', 'deviceOs');
		$models = User::model ()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$response ['status'] = Params::status_no_record;
			$response ['message'] = Params::message_no_record . $this->modelName;
			$response ['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode ( $response ) );
		} else {
			// Prepare response
			$this->responseSuccess($this->modelName, $models);
		}
	}
	
	/**
	 * get all user belong to any individual hospital
	 * param: hospital_id
	 */
	public function actionGetByHospital() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order =  $_GET [Params::param_Order];
		}
		
		if(isset($_GET[Params::param_Hospital_Id])) {
			$criteria->condition = 'hospital_id=:hospital_id';
			$criteria->params = array(':hospital_id' => $_GET[Params::param_Hospital_Id]);
			$criteria->with = array('userLevel', 'deviceOs');
			$models = User::model ()->findAll($criteria);
			
			// Did we get some results?
			if (empty ( $models )) {
				// No
				$this->responseNoRecord($this->modelName);
			} else {
				// Prepare response
				$this->responseSuccess($this->modelName, $models);
			}
		} else {
			// No
			$this->responseMissingParam(Params::param_Hospital_Id);
		}
	}
	
	/**
	 * view user's info detail
	 * param: id
	 */
	public function actionView() {
		// Check if id was submitted via GET
		if(!isset($_GET[Params::param_Id])) {
			$this->responseMissingParam(Params::param_Id);
		} else {
			$criteria = new CDbCriteria ();
			$criteria->with = array('hospital','userLevel', 'deviceOs');
			$model = User::model()->findByPk($_GET[Params::param_Id], $criteria);
			// Did we find the requested model? If not, raise an error
			if(is_null($model)) {
				$this->responseNoRecord($this->modelName);
			}
			else {
				$this->responseSuccess($this->modelName, $model);
			}
		}
	}
	
	/**
	 * create an user and save on db
	 * params: ...
	 */
	public function actionCreate() {
		$missingParams = '';
		if(!isset($_POST[Params::param_Hospital_Id])) {
			$missingParams.= Params::param_Hospital_Id;
		}
		if(!isset($_POST[Params::param_Email])) {
			$missingParams.= ",".Params::param_Email;
		}
		if(!isset($_POST[Params::param_User_Name])) {
			$missingParams.= ",".Params::param_User_Name;
		}
		if(!isset($_POST[Params::param_Contact_Phone])) {
			$missingParams.= ",".Params::param_Contact_Phone;
		}
		if(!isset($_POST[Params::param_Device_Os_Id])) {
			$missingParams.= ",".Params::param_Device_Os_Id;
		}
		if(!isset($_POST[Params::param_Device_Id])) {
			$missingParams.= ",".Params::param_Device_Id;
		}
		
		if($missingParams ==='') { 
			$this->responseMissingParam($missingParams);
		} else {
			$user = new User();
			$user->hospital_id = $_POST[Params::param_Hospital_Id];
			$user->user_level_id = 1;
			$user->email = $_POST[Params::param_Email];
			$user->user_name = $_POST[Params::param_User_Name];
			$user->contact_phone = $_POST[Params::param_Contact_Phone];
			$user->device_os_id = $_POST[Params::param_Device_Os_Id];
			$user->device_id = $_POST[Params::param_Device_Id];
			$user->token = $this->generateToken($_POST[Params::param_Email], $_POST[Params::param_Device_Id]);
			if($user->insert()) {
				$response ['status'] = Params::status_success;
				$response ['message'] = Params::message_success . $this->modelName;
				$response ['data'] = array('token' => $user->token);
				$this->_sendResponse ( 200, CJSON::encode ( $response ) );
			} else {
				$message = 'Register failed.';
				$this->responseFailed($message);
			}
		}
	}
	
	/*
	 * login user to server, maybe update device token id
	 * return a token to user for authenticating
	 */
	public function actionLogin() {
		$missingParams = '';
		if(!isset($_POST[Params::param_Hospital_Id])) {
			$missingParams.= Params::param_Hospital_Id;
		}
		if(!isset($_POST[Params::param_Email])) {
			$missingParams.= ",".Params::param_Email;
		}
		
		if($missingParams==='') {	
			//missing params, response
			$this->responseMissingParam($missingParams);
		} else {	
			//check email and hospital id existed
			$email = $_POST[Params::param_Email];
			$hospital_id = $_POST[Params::param_Hospital_Id];
			$device_id = '';
			if(isset($_POST[Params::param_Device_Id])) {
				$device_id = $_POST[Params::param_Device_Id];
			}
			$user = $this->checkEmailExisted($email, $hospital_id);
			if($user!==NUll && $user->is_actived===1) {
				//email existed, login successfully
				//check if device id is not existed, replace with the new 
				if(!$this->checkDeviceIdExisted($email, $hospital_id, $device_id)) {
					//new device id, replace current device id in database
					User::model()->updateByPk($user->id, array(
					'device_id' => $device_id,
					));
				}
				$token = $this->generateToken($user->email, $user->device_id);
				User::model()->updateByPk($user->id, array(
				'token' => $token,
				));
				$response ['status'] = Params::status_success;
				$response ['message'] = Params::message_success . $this->modelName;
				$response ['data'] = $token;
				$this->_sendResponse ( 200, CJSON::encode ( $response ) );
			} else { 
				$message = 'Login failed, email not found or your account have been deactived by administrator.';
				$this->responseFailed($message);
			}
		}
	}
	public function actionUpdate() {
		
	}
	
	public function actionDelete() {
		
	}
	
	/*
	 * generate a token for authenticating between server and user
	 */
	public function generateToken($email, $device_id) {
		return md5(uniqid($email.$device_id, true));
	}
	
	/*
	 * check if email existed or not
	 */
	public function checkEmailExisted($email, $hospital_id) {
		$criteria = new CDbCriteria();
		$criteria->condition = 'email=:email AND hospital_id=:hospital_id';
		$criteria->params = array(':email' => $email, ':hospital_id' => $hospital_id);
		$result = User::model()->find($criteria);
		return $result;
	}
	
	/*
	 * check if device id is existed or not
	 * if not existed or different, update to new device id
	 */
	public function checkDeviceIdExisted($email, $hospital_id, $device_id){
		$criteria = new CDbCriteria();
		$criteria->condition = 'email=:email AND hospital_id=:hospital_id AND device_id=:device_id';
		$criteria->params = array(':email' => $email, ':hospital_id' => $hospital_id, ':device_id' => $device_id);
		$result = User::model()->find($criteria);
		if($result===NULL) {
			return FALSE;
		} else
			return TRUE;
	}
	
	protected function renderJsonDeep($o) {
		header('Content-type: application/json');
		// if it's an array, call getAttributesDeep for each record
		if (is_array($o)) {
			$data = array();
			foreach ($o as $record) {
				array_push($data, $this->getAttributesDeep($record));
			}
			return CJSON::encode($data);
		} else {
			// otherwise just do it on the passed-in object
			return CJSON::encode( $this->getAttributesDeep($o) );
		}
	
		// this just prevents any other Yii code from being output
		foreach (Yii::app()->log->routes as $route) {
			if($route instanceof CWebLogRoute) {
				$route->enabled = false; // disable any weblogroutes
			}
		}
		Yii::app()->end();
	}
	
	protected function getAttributesDeep($o) {
		// get the attributes and relations
		if(!is_array($o)) {
			$data2 = $o->attributes;
			$relations = $o->relations();
			foreach (array_keys($relations) as $r) {
				// for each relation, if it has the data and it isn't nul/
				if ($o->hasRelated($r) && $o->getRelated($r) != null) {
					// add this to the attributes structure, recursively calling
					// this function to get any of the child's relations
					$data2[$r] = $this->getAttributesDeep($o->getRelated($r));
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
						$data1[$r] = $this->getAttributesDeep($i->getRelated($r));
					}
				}
				$data2[] = $data1;
			}
		}
		return $data2;
	}
	/*
	protected function renderJsonDeep($o) {
		header('Content-type: application/json');
		// if it's an array, call getAttributesDeep for each record
		if (is_array($o)) {
			$data = array();
			foreach ($o as $record) {
				array_push($data, $this->getAttributesDeep($record));
			}
			return CJSON::encode($data);
		} else {
			// otherwise just do it on the passed-in object
			return CJSON::encode( $this->getAttributesDeep($o) );
		}
	
		// this just prevents any other Yii code from being output
		foreach (Yii::app()->log->routes as $route) {
			if($route instanceof CWebLogRoute) {
				$route->enabled = false; // disable any weblogroutes
			}
		}
		Yii::app()->end();
	}
	
	protected function getAttributesDeep($o) {
		// get the attributes and relations
		$data = $o->attributes;
		$relations = $o->relations();
		foreach (array_keys($relations) as $r) {
			// for each relation, if it has the data and it isn't nul/
			if ($o->hasRelated($r) && $o->getRelated($r) != null) {
				// add this to the attributes structure, recursively calling
				// this function to get any of the child's relations
				$data[$r] = $this->getAttributesDeep($o->getRelated($r));
			}
		}
		return $data;
	}
	
	*/
	/**
     * Sends the API response 
     * 
     * @param int $status 
     * @param string $body 
     * @param string $content_type 
     * @access private
     * @return void
     */
    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
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
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
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
    private function _getStatusCodeMessage($status)
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
    private function _checkAuth()
    {
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if(!(isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME']) and isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME'];
        $password = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD'];
        // Find the user
        $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        if($user===null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if(!$user->validatePassword($password)) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
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
    private function _getObjectEncoded($model, $array)
    {
        if(isset($_GET['format']))
            $this->format = $_GET['format'];

        if($this->format=='json')
        {
            return CJSON::encode($array);
        }
        elseif($this->format=='xml')
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
    } // }}} 
    // }}} End Other Methods
}

?>
	