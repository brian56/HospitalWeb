<?php
class HospitalController extends Controller {
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
	private $modelName = 'Hospital';
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
		$conditions = array ();
		
		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		
		if (isset ( $_GET [Params::param_Limit] )) {
			$limit = $_GET [Params::param_Limit];
			$criteria->limit = $limit;
		}
		
		if (isset ( $_GET [Params::param_Order] )) {
			$orderBy = $_GET [Params::param_Order];
			$criteria->order = $order;
		}
		
		$models = Hospital::model ()->findAll ( $criteria );
		
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
		if (! isset ( $_GET [Params::param_Id] ))
			Response::MissingParam(Params::param_Id);
		$model = Hospital::model ()->findByPk ( $_GET [Params::param_Id] );
		// Did we find the requested model? If not, raise an error
		if (is_null ( $model ))
			Response::NoRecord($this->modelName);
		else
			Response::Success($this->modelName, $model);
	}
	public function actionCreate() {
		
	}
	public function actionUpdate() {
	}
	public function actionDelete() {
	}
}

?>
	