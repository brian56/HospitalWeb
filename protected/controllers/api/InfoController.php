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

	// Actions
	public function actionGetAll() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		$criteria->order = 't.date_create DESC';
		$criteria->with = array('user', 'hospital', 'infoComments', 'infoType');
		
		$models = Info::model()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			Response::NoRecord($this->modelName);
		} else {
			// Send the response
			Response::Success($this->modelName, $models);
		}
	}
	
	public function actionGetByType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array();

		if(!isset($_GET[Params::param_Info_Type_Id])) {
			Response::MissingParam(Params::param_Info_Type_Id);
		}
		if(!isset($_GET[Params::param_Hospital_Id])) {
			Response::MissingParam(Params::param_Hospital_Id);
		}
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}		
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}		
		$criteria->order = 't.date_create DESC';
		
		$conditions[] = 't.info_type_id=:info_type_id';
		$criteria->params = array_merge($criteria->params, array(':info_type_id' => $_GET[Params::param_Info_Type_Id]));
		$conditions[] = 't.hospital_id=:hospital_id';
		$criteria->params = array_merge($criteria->params, array(':hospital_id' => $_GET[Params::param_Hospital_Id]));
		
		if($conditions!=null) {
			$criteria->condition=implode(' AND ',$conditions);
		}
		
		$criteria->with = array('user', 'hospital', 'infoComments');
		
		$models = Info::model ()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			Response::NoRecord($this->modelName);
		} else {
// 			// Prepare response
			Response::Success($this->modelName, $models);
		}
	}
	
	public function actionGetByUserAndType() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array();
		
		if(!isset($_GET[Params::param_Hospital_Id])) {
			Response::MissingParam(Params::param_Hospital_Id);
		}
		if(!isset($_GET[Params::param_User_Id])) {
			Response::MissingParam(Params::param_User_Id);
		}
		if(!isset($_GET[Params::param_Info_Type_Id])) {
			Response::MissingParam(Params::param_Info_Type_Id);
		}
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		$criteria->order = 't.date_create DESC';

		$conditions[] = 't.hospital_id=:hospital_id';
		$criteria->params = array_merge($criteria->params, array(':hospital_id' => $_GET[Params::param_Hospital_Id]));

		$conditions[] = 't.user_id=:user_id';
		$criteria->params = array(':user_id' => $_GET[Params::param_User_Id]);
		
		$conditions[] = 't.info_type_id=:info_type_id';
		$criteria->params = array_merge($criteria->params, array(':info_type_id' => $_GET[Params::param_Info_Type_Id]));
		
		if($conditions!=null) {
			$criteria->condition=implode(' AND ',$conditions);
		}

		$criteria->with = array('infoComments');
		
		$models = Info::model ()->findAll($criteria);
		
		// Did we get some results?
		if (empty ( $models )) {
			// No
			Response::NoRecord($this->modelName);
		} else {
 			// Prepare response
			Response::Success($this->modelName, $models);
		}
	}
	
	public function actionView() {
		// Check if id was submitted via GET
		if(!isset($_GET[Params::param_Id])) {
			Response::MissingParam(Params::param_Id);
		} else {
			$criteria = new CDbCriteria ();
			$with[] = 'user';
			$with[] = 'hospital';
			$with[] = 'infoComments';
			$criteria->with = $with;
			$model = Info::model()->findByPk($_GET[Params::param_Id],$criteria);
			// Did we find the requested model? If not, raise an error
			if(is_null($model)) {
				Response::NoRecord($this->modelName);
			}
			else {
				Response::Success($this->modelName, $model);
			}
		}
	}
	
	public function actionCreate() {
		if(!isset($_POST[Params::param_Info_Type_Id])) {
			Response::MissingParam(Params::param_Info_Type_Id);
		}		
		if(!isset($_POST[Params::param_Hospital_Id])) {
			Response::MissingParam(Params::param_Hospital_Id);
		}		
		if(!isset($_POST[Params::param_Token])) {
			Response::MissingParam(Params::param_Token);
		}		
		if(!isset($_POST[Params::param_Title])) {
			Response::MissingParam(Params::param_Content);
		}		
		if(!isset($_POST[Params::param_Access_Level_Id])) {
			Response::MissingParam(Params::param_Access_Level_Id);
		}	

		$info = new Info();
		$info->info_type_id = $_POST[Params::param_Info_Type_Id];
		$info->hospital_id = $_POST[Params::param_Hospital_Id];
		$user_id = Response::getUserIdFromToken($_POST[Params::param_Token]);
		if(!is_null($user_id)) {
			$info->user_id = $user_id;
		} else {
			$message = "Authenticate failed. Token had been expired.";
			Response::Failed($message);
		}
		$info->title = $_POST[Params::param_Title];
		$info->access_level_id = $_POST[Params::param_Access_Level_Id];
		$info->content = $_POST[Params::param_Content];
		if(isset($_POST[Params::param_Appointment_Date])) {
			$info->appointment_date = $_POST[Params::param_Appointment_Date];	
			$info->appointment_status = 0;		//appointment is pending
		}		
		if ($info->insert ()) {
			Response::SuccessNoData($this->modelName);
		} else {
			$message = 'Insert failed.';
			Response::Failed($message);
		}
	}
	public function actionUpdate() {
		
	}
	public function actionDelete() {
		
	}
	
}

?>
	
