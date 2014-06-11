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
	//actions
	public function actionGetByInfo() {
		// Get the respective model instance
		$criteria = new CDbCriteria ();
		$conditions = array ();
		
		if (!isset ( $_GET [Params::param_Info_Id] )) {
			Response::MissingParam(Params::param_Info_Id);
		}

		if (isset ( $_GET [Params::param_Offset] )) {
			$criteria->offset = $_GET [Params::param_Offset];
		}
		if (isset ( $_GET [Params::param_Limit] )) {
			$criteria->limit = $_GET [Params::param_Limit];
		}
		if (isset ( $_GET [Params::param_Order] )) {
			$criteria->order = $_GET [Params::param_Order];
		}
		$criteria->order = 't.date_create ASC';
		$criteria->params = array (':info_id' => $_GET [Params::param_Info_Id]);
		$criteria->condition = 't.info_id=:info_id';
		$models = InfoComment::model ()->findAll ( $criteria );
		
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
		if (!isset ( $_GET [Params::param_Id] ))
			Response::MissingParam(Params::param_Id);
		$model = InfoComment::model ()->findByPk ( $_GET [Params::param_Id] );
		// Did we find the requested model? If not, raise an error
		if (is_null ( $model ))
			Response::NoRecord($this->modelName);
		else
			Response::Success($this->modelName, $model);
	}
	public function actionCreate() {
		if(!isset($_POST[Params::param_Info_Id])) {
			Response::MissingParam(Params::param_Info_Id);
		}
		if(!isset($_POST[Params::param_Token])) {
			Response::MissingParam(Params::param_Token);
		}
		if(!isset($_POST[Params::param_Content])) {
			Response::MissingParam(Params::param_Content);
		}
		
		$infoComment = new InfoComment();
		$infoComment->info_id = $_POST[Params::param_Info_Id];
		
		$user_id = Response::getUserIdFromToken($_POST[Params::param_Token]);
		if(!is_null($user_id)) {
			$infoComment->user_id = $user_id;
		} else {
			$message = "Authenticate failed. Token had been expired.";
			Response::Failed($message);
		}
		$infoComment->content = $_POST[Params::param_Content];
		if ($infoComment->insert ()) {
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