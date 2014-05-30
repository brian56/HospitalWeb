<?php
class UserController extends Controller {
	// Members
	/**
	 * Key which has to be in HTTP USERNAME and PASSWORD headers
	 */
	private $modelName = 'User';
	/**
	 * Default response format
	 * either 'json' or 'xml'
	 */
	private $with = array ();
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array ();
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
			$criteria->limit = $_GET [Params::param_Limit];
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET [Params::param_Order];
		}
		
		$criteria->with = array (
				'hospital',
				'userLevel',
				'deviceOs' 
		);
		$models = User::model ()->findAll ( $criteria );
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			Response::NoRecord($this->modelName);
		} else {
			Response::Success($this->modelName, $models);
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
			$criteria->order = $_GET [Params::param_Order];
		}
		
		if (isset ( $_GET [Params::param_Hospital_Id] )) {
			$criteria->condition = 'hospital_id=:hospital_id';
			$criteria->params = array (
					':hospital_id' => $_GET [Params::param_Hospital_Id] 
			);
			$criteria->with = array (
					'userLevel',
					'deviceOs' 
			);
			$models = User::model ()->findAll ( $criteria );
			
			// Did we get some results?
			if (empty ( $models )) {
				// No
				Response::NoRecord( $this->modelName );
			} else {
				// Prepare response
				Response::Success($this->modelName, $models);
			}
		} else {
			// No
			Response::MissingParam(Params::param_Hospital_Id);
		}
	}
	
	/**
	 * view user's info detail
	 * param: id
	 */
	public function actionView() {
		// Check if id was submitted via GET
		if (! isset ( $_GET [Params::param_Id] )) {
			$this->responseMissingParam ( Params::param_Id );
		} else {
			$criteria = new CDbCriteria ();
			$criteria->with = array (
					'hospital',
					'userLevel',
					'deviceOs' 
			);
			$model = User::model ()->findByPk ( $_GET [Params::param_Id], $criteria );
			// Did we find the requested model? If not, raise an error
			if (is_null ( $model )) {
				Response::NoRecord( $this->modelName );
			} else {
				Response::Success( $this->modelName, $model );
			}
		}
	}
	
	/**
	 * create an user and save on db
	 * params: .
	 * ..
	 */
	public function actionCreate() {
		if (! isset ( $_POST [Params::param_Hospital_Id] )) {
			Response::MissingParam(Params::param_Hospital_Id);
		}
		if (! isset ( $_POST [Params::param_Email] )) {
			Response::MissingParam(Params::param_Email);
		}
		if (! isset ( $_POST [Params::param_User_Name] )) {
			Response::MissingParam(Params::param_User_Name);
		}
		if (! isset ( $_POST [Params::param_Contact_Phone] )) {
			Response::MissingParam(Params::param_Contact_Phone);
		}
		if (! isset ( $_POST [Params::param_Device_Os_Id] )) {
			Response::MissingParam(Params::param_Device_Os_Id);
		}
		if (! isset ( $_POST [Params::param_Device_Id] )) {
			Response::MissingParam(Params::param_Device_Id);
		}
		$user = new User ();
		$user->hospital_id = $_POST [Params::param_Hospital_Id];
		$user->user_level_id = 1;
		$user->email = $_POST [Params::param_Email];
		$user->user_name = $_POST [Params::param_User_Name];
		$user->contact_phone = $_POST [Params::param_Contact_Phone];
		$user->device_os_id = $_POST [Params::param_Device_Os_Id];
		$user->device_id = $_POST [Params::param_Device_Id];
		$user->token = $this->generateToken ( $_POST [Params::param_Email], $_POST [Params::param_Device_Id] );
		if ($user->insert ()) {
			$data = array('token' => $user->token );
			Response::Success($this->modelName, $data);
		} else {
			$message = 'Register failed.';
			Response::Failed($message);
		}
	}
	
	/*
	 * login user to server, maybe update device token id return a token to user for authenticating
	 */
	public function actionLogin() {
		$missingParams = '';
		if (! isset ( $_POST [Params::param_Hospital_Id] )) {
			Response::MissingParam(Params::param_Hospital_Id);
		}
		if (! isset ( $_POST [Params::param_Email] )) {
			Response::MissingParam(Params::param_Email);
		}
	
		// check email and hospital id existed
		$email = $_POST [Params::param_Email];
		$hospital_id = $_POST [Params::param_Hospital_Id];
		$device_id = '';
		if (isset ( $_POST [Params::param_Device_Id] )) {
			$device_id = $_POST [Params::param_Device_Id];
		}
		$user = $this->checkEmailExisted ( $email, $hospital_id );
		if ($user !== NUll && $user->is_actived === 1) {
			// email existed, login successfully
			// check if device id is not existed, replace with the new
			if (! $this->checkDeviceIdExisted ( $email, $hospital_id, $device_id )) {
				// new device id, replace current device id in database
				User::model ()->updateByPk ( $user->id, array (
						'device_id' => $device_id 
				) );
			}
			$token = $this->generateToken ( $user->email, $user->device_id );
			User::model ()->updateByPk ( $user->id, array (
					'token' => $token 
			) );
			
			$data = array('token' => $token);
			Response::Success($this->modelName, $data);
		} else {
			$message = 'Login failed, email not found or your account have been deactived by administrator.';
			Response::Failed($message);
		}
	}
	public function actionUpdate() {
	}
	public function actionDelete() {
	}
	
	/**
	 * generate a token for authenticating between server and user
	 * @param string $email user's email
	 * @param string $device_id user's device id
	 * @return string the token for authenticating
	 */
	public function generateToken($email='', $device_id='') {
		return md5 ( uniqid ( $email . $device_id, true ) );
	}
	
	/**
	 * Check if email existed or not 
	 * @param unknown $email user's email
	 * @param unknown $hospital_id user's hospital id
	 * @return ActiveRecord an user object if existed, null if didn't existed
	 */
	public function checkEmailExisted($email, $hospital_id) {
		$criteria = new CDbCriteria ();
		$criteria->condition = 'email=:email AND hospital_id=:hospital_id';
		$criteria->params = array (
				':email' => $email,
				':hospital_id' => $hospital_id 
		);
		$result = User::model ()->find ( $criteria );
		return $result;
	}
	
	/**
	 * Check if device id is existed or not 
	 * if not existed or different, update current to new device id
	 * @param string $email user's email
	 * @param number $hospital_id user's hospital id
	 * @param string $device_id user's device id
	 * @return boolean TRUE if device id existed, otherwise FALSE
	 */
	public function checkDeviceIdExisted($email='', $hospital_id=0, $device_id='') {
		$criteria = new CDbCriteria ();
		$criteria->condition = 'email=:email AND hospital_id=:hospital_id AND device_id=:device_id';
		$criteria->params = array (
				':email' => $email,
				':hospital_id' => $hospital_id,
				':device_id' => $device_id 
		);
		$result = User::model ()->find ( $criteria );
		if ($result === NULL) {
			return FALSE;
		} else
			return TRUE;
	}
}

?>
	