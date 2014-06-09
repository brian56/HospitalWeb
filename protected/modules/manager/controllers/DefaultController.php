<?php

class DefaultController extends Controller
{
	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
	
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest || !Yii::app()->user->getState('isManager')) {
			$this->redirect ( array (
					'/site/login'
			) );
		} else 
		$this->render('index');
	}
	
}