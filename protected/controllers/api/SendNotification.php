<?php 
class SendNotification {
	/**
	 * Push notification to one device
	 * @param string $token device's token
	 * @param string $content the content of message to push to device 
	 */
	public static function actionPushOneDevice($token='', $content='') {
			$message = 'testing';
			$gcm = Yii::app()->gcm;
			$gcm->send($token, $message, array('extra' => 'one device', 'value' => $content), array( 'delayWhileIdle' => true ));
	}
	
	/**
	 * Push notification to many devices
	 * @param array $tokens device's token
	 * @param string $content the content of message to push to devices
	 */
	public static function actionPushMultiDevice($tokens= array(), $content='') {
		$message = 'testing';
		$gcm = Yii::app()->gcm;
		$gcm->sendMulti($tokens, $message, array('extra' => 'multi devices ', 'value' => $content), array( 'delayWhileIdle' => true ));
	}
}
?>