<?php
class InfoCommentController extends Controller {
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
	private $modelName = 'InfoComment';
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array ();
	}
	public function actionIndex() {
		echo CJSON::encode ( array (
				1,
				2,
				3 
		) );
	}
	// Actions
	public function actionGetAll() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array ();
		
		if (isset ( $_GET ['offset'] )) {
			$criteria->offset = $_GET ['offset'];
		}
		
		if (isset ( $_GET ['limit'] )) {
			$limit = $_GET ['limit'];
			$criteria->limit = $limit;
		}
		
		if (isset ( $_GET ['order'] )) {
			$orderBy = $_GET ['order'];
			$criteria->order = $order;
		}
		
		if (isset ( $_GET ['hospital_id'] )) {
			$conditions [] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge ( $criteria->params, array (
					':hospital_id' => $_GET ['hospital_id'] 
			) );
		}
		
		$criteria->conditions = implode ( ' AND ', $conditions );
		$models = InfoComment::model ()->findAll ( $criteria );
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$this->_sendResponse ( 200, sprintf ( 'No items were found for model <b>%s</b>', $this->modelName ) );
		} else {
			// Prepare response
			$rows = array ();
			foreach ( $models as $model )
				$rows [] = $model->attributes;
				// Send the response
			$this->_sendResponse ( 200, CJSON::encode ( $rows ) );
		}
	}
	public function actionGetByType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array ();
		
		if (isset ( $_GET ['offset'] )) {
			$criteria->offset = $_GET ['offset'];
		}
		
		if (isset ( $_GET ['limit'] )) {
			$limit = $_GET ['limit'];
			$criteria->limit = $limit;
		}
		
		if (isset ( $_GET ['order'] )) {
			$orderBy = $_GET ['order'];
			$criteria->order = $order;
		}
		
		if (isset ( $_GET ['info_type_id'] )) {
			$conditions [] = 'info_type_id=:info_type_id';
			$criteria->params = array_merge ( $criteria->params, array (
					':info_type_id' => $_GET ['info_type_id'] 
			) );
		}
		
		if (isset ( $_GET ['hospital_id'] )) {
			$conditions [] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge ( $criteria->params, array (
					':hospital_id' => $_GET ['hospital_id'] 
			) );
		}
		
		$criteria->conditions = implode ( ' AND ', $conditions );
		$models = InfoComment::model ()->findAll ( $criteria );
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$this->_sendResponse ( 200, sprintf ( 'No items were found for model <b>%s</b>', $this->modelName ) );
		} else {
			// Prepare response
			$rows = array ();
			foreach ( $models as $model )
				$rows [] = $model->attributes;
				// Send the response
			$this->_sendResponse ( 200, CJSON::encode ( $rows ) );
		}
	}
	public function actionGetByUserAndType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array ();
		
		if (isset ( $_GET ['offset'] )) {
			$criteria->offset = $_GET ['offset'];
		}
		
		if (isset ( $_GET ['limit'] )) {
			$limit = $_GET ['limit'];
			$criteria->limit = $limit;
		}
		
		if (isset ( $_GET ['order'] )) {
			$orderBy = $_GET ['order'];
			$criteria->order = $order;
		}
		
		if (isset ( $_GET ['hospital_id'] )) {
			$conditions [] = 'hospital_id=:hospital_id';
			$criteria->params = array_merge ( $criteria->params, array (
					':hospital_id' => $_GET ['hospital_id'] 
			) );
		}
		
		if (isset ( $_GET ['user_id'] )) {
			$conditions [] = 'user_id=:user_id';
			$criteria->params = array (
					':userid' => $_GET ['user_id'] 
			);
		}
		
		if (isset ( $_GET ['info_type_id'] )) {
			$conditions [] = 'info_type_id=:info_type_id';
			$criteria->params = array_merge ( $criteria->params, array (
					':info_type_id' => $_GET ['info_type_id'] 
			) );
		}
		
		$criteria->conditions = implode ( ' AND ', $conditions );
		$models = InfoComment::model ()->findAll ( $criteria );
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			$this->_sendResponse ( 200, sprintf ( 'No items were found for model <b>%s</b>', $this->modelName ) );
		} else {
			// Prepare response
			$rows = array ();
			foreach ( $models as $model )
				$rows [] = $model->attributes;
				// Send the response
			$this->_sendResponse ( 200, CJSON::encode ( $rows ) );
		}
	}
	public function actionView() {
		// Check if id was submitted via GET
		if (! isset ( $_GET ['id'] ))
			$this->_sendResponse ( 500, 'Error: Parameter <b>id</b> is missing' );
		$model = InfoComment::model ()->findByPk ( $_GET ['id'] );
		// Did we find the requested model? If not, raise an error
		if (is_null ( $model ))
			$this->_sendResponse ( 404, 'No Item found with id=' . $_GET ['id'] );
		else
			$this->_sendResponse ( 200, CJSON::encode ( $model ) );
	}
	public function actionCreate() {
	}
	public function actionUpdate() {
	}
	public function actionDelete() {
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
	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
		$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage ( $status );
		// set the status
		header ( $status_header );
		// set the content type
		header ( 'Content-type: ' . $content_type );
		
		// pages with body are easy
		if ($body != '') {
			// send the body
			echo $body;
			exit ();
		} 		// we need to create the body if none is passed
		else {
			// create some body messages
			$message = '';
			
			// this is purely optional, but makes the pages a little nicer to read
			// for your users. Since you won't likely send a lot of different status codes,
			// this also shouldn't be too ponderous to maintain
			switch ($status) {
				case 401 :
					$message = 'You must be authorized to view this page.';
					break;
				case 404 :
					$message = 'The requested URL ' . $_SERVER ['REQUEST_URI'] . ' was not found.';
					break;
				case 500 :
					$message = 'The server encountered an error processing your request.';
					break;
				case 501 :
					$message = 'The requested method is not implemented.';
					break;
			}
			
			// servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
			$signature = ($_SERVER ['SERVER_SIGNATURE'] == '') ? $_SERVER ['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER ['SERVER_NAME'] . ' Port ' . $_SERVER ['SERVER_PORT'] : $_SERVER ['SERVER_SIGNATURE'];
			
			// this should be templatized in a real-world solution
			$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage ( $status ) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage ( $status ) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';
			
			echo $body;
			exit ();
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
	private function _getStatusCodeMessage($status) {
		// these could be stored in a .ini file and loaded
		// via parse_ini_file()... however, this will suffice
		// for an example
		$codes = Array (
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
		
		return (isset ( $codes [$status] )) ? $codes [$status] : '';
	} // }}}
	  // {{{ _checkAuth
	/**
	 * Checks if a request is authorized
	 *
	 * @access private
	 * @return void
	 */
	private function _checkAuth() {
		// Check if we have the USERNAME and PASSWORD HTTP headers set?
		if (! (isset ( $_SERVER ['HTTP_X_' . self::APPLICATION_ID . '_USERNAME'] ) and isset ( $_SERVER ['HTTP_X_' . self::APPLICATION_ID . '_PASSWORD'] ))) {
			// Error: Unauthorized
			$this->_sendResponse ( 401 );
		}
		$username = $_SERVER ['HTTP_X_' . self::APPLICATION_ID . '_USERNAME'];
		$password = $_SERVER ['HTTP_X_' . self::APPLICATION_ID . '_PASSWORD'];
		// Find the user
		$user = User::model ()->find ( 'LOWER(username)=?', array (
				strtolower ( $username ) 
		) );
		if ($user === null) {
			// Error: Unauthorized
			$this->_sendResponse ( 401, 'Error: User Name is invalid' );
		} else if (! $user->validatePassword ( $password )) {
			// Error: Unauthorized
			$this->_sendResponse ( 401, 'Error: User Password is invalid' );
		}
	} // }}}
	  // {{{ _getObjectEncoded
	/**
	 * Returns the json or xml encoded array
	 *
	 * @param mixed $model        	
	 * @param mixed $array
	 *        	Data to be encoded
	 * @access private
	 * @return void
	 */
	private function _getObjectEncoded($model, $array) {
		if (isset ( $_GET ['format'] ))
			$this->format = $_GET ['format'];
		
		if ($this->format == 'json') {
			return CJSON::encode ( $array );
		} elseif ($this->format == 'xml') {
			$result = '<?xml version="1.0">';
			$result .= "\n<$model>\n";
			foreach ( $array as $key => $value )
				$result .= "    <$key>" . utf8_encode ( $value ) . "</$key>\n";
			$result .= '</' . $model . '>';
			return $result;
		} else {
			return;
		}
	} // }}}
		  // }}} End Other Methods
}

?>
	