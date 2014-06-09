<?php

class DefaultController extends Controller
{
	public function beforeControllerAction(CAction $action)
	{
		if (Yii::app()->user->isGuest && ! ($action->controller->id == 'site' && $action->id == 'login')) {
			$this->redirect ( array (
					'/site/login' 
			) );
		}
		return true;
	}
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest || !Yii::app()->user->getState('isAdmin')) {
			$this->redirect ( array (
					'/site/login'
			) );
		} else 
			$this->render('index');
	}
	
	
}