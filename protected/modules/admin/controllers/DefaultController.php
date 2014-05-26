<?php

class DefaultController extends RController
{
	/* public function beforeControllerAction(CAction $action)
	{
		if (Yii::app()->user->isGuest && ! ($action->controller->id == 'site' && $action->id == 'login')) {
			$this->redirect ( array (
					'/site/login' 
			) );
		}
		return true;
	} */
	public function filters()
	{
		return array(
				'rights',
		);
	}
	
	public function actionIndex()
	{
		/* if (Yii::app()->user->isGuest || !Yii::app()->user->isAdmin()) {
			$this->redirect ( array (
					'/site/login'
			) );
		} else  */
			$this->render('index');
	}
	
	
}