<?php
class CommonDataController extends Controller {
	// Members
	/**
	 * Key which has to be in HTTP USERNAME and PASSWORD headers
	 */
	Const APPLICATION_ID = 'ASCCPE';
	private $modelName = 'CommonData';
	/**
	 * Default response format
	 * either 'json' or 'xml'
	 */
	private $format = 'json';
	private $with = array ();
	private $response = array ();
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array ();
	}
	// Actions
	public function actionGetData() {
		// Get the respective model instance
		if (!isset ( $_GET [Params::param_Last_Time_Update] )) {
			Response::MissingParam(Params::param_Last_Time_Update);
		}
		$criteria = new CDbCriteria ();
		$data = array ();
		
		$criteria->select = 'MAX(date_create) AS maxDateCreate';
		$row = ChangeLog::model ()->find ( $criteria );
		$date = $row ['maxDateCreate'];
		
		if (strtotime ( $date ) > strtotime ( $_GET [Params::param_Last_Time_Update] )) {
			$data ['event'] = Event::model ()->findAll ();
			$data ['info_type'] = InfoType::model ()->findAll ();
			$data ['user_level'] = UserLevel::model ()->findAll ();
			$data ['device_os'] = DeviceOs::model ()->findAll ();
			$data ['access_level'] = AccessLevel::model ()->findAll ();
		}
		// Did we get some results?
		if (empty ( $data )) {
			Response::NoRecord($this->modelName);
		} else {
			Response::Success($this->modelName, $data);
		}
	}
	public function actionGetByHospital() {
	}
	public function actionView() {
	}
	public function actionCreate() {
	}
	public function actionUpdate() {
	}
	public function actionDelete() {
	}
}
?>