<?php
class InfoController extends Controller {
	// Members
	/**
	 * Key which has to be in HTTP USERNAME and PASSWORD headers
	 */
	Const APPLICATION_ID = 'ASCCPE';
	/**
	 * Default response format
	 * either 'json' or 'xml'
	 */
	private $format = 'json';
	private	$modelName = 'Info';		
	
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
	public function responseFailed() {
		$response ['status'] = Params::status_failed;
		$response ['message'] = Params::message_failed;
		$response ['data'] = '';
		$this->_sendResponse ( 200, CJSON::encode ( $response ) );
	}
	public function responseParamError($param) {
		$response ['status'] = Params::status_params_error;
		$response ['message'] = Params::message_params_error.$param;
		$response ['data'] = '';
		$this->_sendResponse ( 200, CJSON::encode ( $response ) );
	}
		// Actions
	public function actionGetAll() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET [Params::param_Order];
		}
		
		/* if(isset($_GET[Params::param_User_Id])) {
			$conditions[] = 'user_id=:user_id';
			$criteria->params = array(':user_id' => $_GET['user_id']);
		} else {
			$with[] = 'user';
		}
		
		if(isset($_GET[Params::param_Info_Type_Id])) {
			$conditions[] = 'info_type_id=:info_type_id';
			$criteria->params = array_merge($criteria->params, array(':info_type_id' => $_GET[Params::param_Info_Type_Id]));
		}
		
		if(isset($_GET[Params::param_Hospital_Id])) {
			$conditions[] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge($criteria->params, array(':hospital_id' => $_GET[Params::param_Hospital_Id]));
		} else {
			$with[] = 'hospital';
		} */
		
		if($conditions!=null) {
			$criteria->conditions=implode(' AND ',$conditions);
		}
		$with[] = 'user';
		$with[] = 'hospital';
		$with[] = 'infoComments';
		$with[] = 'infoType';
		$criteria->with = $with;
		
		$models = Info::model()->findAll($criteria);
		//chay vong lap chuyen tu object -> array de tau man cho nhanh hi ook em
		//may lag nhu cho a =,= huynh bo dong ni vo tron;g vong foreach, buzz
		
// 		$RESULT = ARRAY();
		/* $result = array();
		foreach ($models as $info) {
			$temp = array();
			$temp['id'] = $info->id;
			$temp['info_type_id'] = $info->info_type_id;
			$temp['user_id'] = $info->user_id;
			$temp['hospital_id'] = $info->hospital_id;
			$temp['status'] = $info->status;
			$temp['title'] = $info->title;
			$temp['content'] = $info->content;
			$temp['date_create'] = $info->date_create;
			$temp['date_update'] = $info->date_update;
			$temp['access_level_id'] = $info->access_level_id;
			if($info->hospital !=null) {
				foreach ($info->hospital as $hospital) {
					$t = array();
					$t['id'] = $hospital->id;
					$t['name'] = $hospital->name;
					$t['name_en'] = $hospital->name_en;
					$t['is_actived'] = $hospital->is_actived;
					//$t['introduction'] = $hospital->introducti;
					[id] => 1		dm tau chan quai, may moc nhu cut a... =ok.
					
					[photos] => photo link goes here...
					[location] => location goes here... 
				}
				$temp['hospital'] = $t;
			}
			array_push($result, $temp);				
		}
		 */
		/* echo  "<pre>";
		print_r($models);
		echo "</pre>";
		die(); */
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$response['status'] = Params::status_no_record;
			$response['message'] = Params::message_no_record.$this->modelName;
			$response['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode($response) );
		} else {
				// Send the response
				$response['status'] = Params::status_success;
				$response['message'] = Params::message_success.$this->modelName;
				$response['data'] = json_decode($this->renderJsonDeep( $models ));
				$this->_sendResponse ( 200, CJSON::encode($response ) );
		}
	}
	
	public function actionGetByType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array();
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET [Params::param_Order];
		}

		if(isset($_GET[Params::param_Info_Type_Id])) {
			$conditions[] = 'info_type_id=:info_type_id';
			$criteria->params = array_merge($criteria->params, array(':info_type_id' => $_GET[Params::param_Info_Type_Id]));
		} 
		/* else {
			$response['status'] = Params::status_params_missing;
			$response['message'] = Params::message_params_missing.Params::param_Info_Type_Id;
			$response['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode($response) );
		} */
		
		if(isset($_GET[Params::param_Hospital_Id])) {
			$conditions[] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge($criteria->params, array(':hospital_id' => $_GET[Params::param_Hospital_Id]));
		}
		
		if($conditions!=null) {
			$criteria->conditions=implode(' AND ',$conditions);
		}
		
		$with[] = 'user';
		$with[] = 'hospital';
		$with[] = 'infoComments';
		$criteria->with = $with;
		
		$models = Info::model ()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$response['status'] = Params::status_no_record;
			$response['message'] = Params::message_no_record.$this->modelName;
			$response['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode($response) );
		} else {
// 			// Prepare response
 			$response['status'] = Params::status_success;
			$response['message'] = Params::message_success.$this->modelName;
			$response['data'] = json_decode($this->renderJsonDeep( $models ));
			$this->_sendResponse ( 200, CJSON::encode($response ) );
		}
	}
	
	public function actionGetByUserAndType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET [Params::param_Order];
		}

		if(isset($_GET[Params::param_Hospital_Id])) {
			$conditions[] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge($criteria->params, array(':hospital_id' => $_GET[Params::param_Hospital_Id]));
		}
		
		if(isset($_GET[Params::param_User_Id])) {
			$conditions[] = 'user_id=:user_id';
			$criteria->params = array(':user_id' => $_GET[Params::param_User_Id]);
		}
		
		if(isset($_GET[Params::param_Info_Type_Id])) {
			$conditions[] = 'info_type_id=:info_type_id';
			$criteria->params = array_merge($criteria->params, array(':info_type_id' => $_GET[Params::param_Info_Type_Id]));
		}
		
		if($conditions!=null) {
			$criteria->conditions=implode(' AND ',$conditions);
		}

		$with[] = 'infoComments';
		$criteria->with = $with;
		
		$models = Info::model ()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$response['status'] = Params::status_no_record;
			$response['message'] = Params::message_no_record.$this->modelName;
			$response['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode($response) );
		} else {
// 			// Prepare response
			$response['status'] = Params::status_success;
			$response['message'] = Params::message_success.$this->modelName;
			$response['data'] = json_decode($this->renderJsonDeep( $models ));
			$this->_sendResponse ( 200, CJSON::encode($response ) );
		}
	}
	
	public function actionView() {
		// Check if id was submitted via GET
		if(!isset($_GET[Params::param_Id])) {
			$response['status'] = Params::status_params_missing;
			$response['message'] = Params::message_params_missing.Params::param_Id;
			$response['data'] = '';
			$this->_sendResponse ( 200, CJSON::encode($response) );
		} else {
			$criteria = new CDbCriteria ();
			$with[] = 'user';
			$with[] = 'hospital';
			$with[] = 'infoComments';
			$criteria->with = $with;
			$model = Info::model()->findByPk($_GET[Params::param_Id],$criteria);
			// Did we find the requested model? If not, raise an error
			if(is_null($model)) {
				$response['status'] = Params::status_no_record;
				$response['message'] = Params::message_no_record.$this->modelName.'___'.Params::param_Id.':'.$_GET[Params::param_Id];
				$response['data'] = '';
				$this->_sendResponse ( 200, CJSON::encode($response) );
			}
			else {
				$response['status'] = Params::status_success;
				$response['message'] = Params::message_success.$this->modelName;
				$response['data'] = json_decode($this->renderJsonDeep( $model ));
				$this->_sendResponse ( 200, CJSON::encode($response ) );
			}
		}
	}
	public function actionCreate() {
		
	}
	public function actionUpdate() {
		
	}
	public function actionDelete() {
		
	}
	
	/**
	 * Method to get the related object from active record array and convert to JSON
	 * @param unknown $o
	 */
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
	