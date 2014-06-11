<?php

use PHP_GCM\Message;
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionPush() {
		$content = '';
		if(isset($_POST['data']) && $_POST['data']!=='')
		{
			$content = $_POST['data'];
			$push_tokens = 'APA91bGtYCCfcNGvZb2uiabB5wOiy72TMIIjFSUOZJ8iJqDRHfj3n-426D2oGXqurTCvmGDFfrN-JFUVGYd31L6JJMRceD2SX4rrxoxnHaof6C55FAFHjfinVbagO4gpniMq1v7R72W2bwBt6rt-PpEbzu3cFfmhaQ';
			$gcm = Yii::app()->gcm;
			$gcm->send($push_tokens, $message, array('extra' => 'one device', 'title'=> $content, 'value' =>''), array( 'delayWhileIdle' => true ));
		}
	}
	
	public function actionPushMultiDevice() {
		$content = '';
		if(isset($_POST['data']) && $_POST['data']!=='')
		{
			$content = $_POST['data'];
			$push_tokens = array('APA91bF5RbiRiHEsVQv7Usj3LE82WQNULV2B6-Z36tYg8pR5zcZ7E5vUiKAC2iQaCJwT40s9ZyH8NNJ5HlG_XBvOPjohSRGTGIkz2b-XqwdmQWV1Cqy7GVZQZ4vWzT-4QnWbs0EmxObYoN4heIoMX2Mc9SG5z4ukWg',
					'APA91bGtYCCfcNGvZb2uiabB5wOiy72TMIIjFSUOZJ8iJqDRHfj3n-426D2oGXqurTCvmGDFfrN-JFUVGYd31L6JJMRceD2SX4rrxoxnHaof6C55FAFHjfinVbagO4gpniMq1v7R72W2bwBt6rt-PpEbzu3cFfmhaQ');
			$gcm = Yii::app()->gcm;
			$gcm->sendMulti($push_tokens, $message, array('extra' => 'multi devices ','title'=> $content, 'value' =>''), array( 'delayWhileIdle' => true ));
		}
	}
}
