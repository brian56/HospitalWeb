<?php 
class SendNotification {
	/**
	 * Push notification to one device
	 * @param string $token device's token
	 * @param string $content the content of message to push to device 
	 */
	public static function actionPushOneDevice($token='', $title='', $content='', $info_type_id=1, $id=1) {
			$message = 'testing';
			$gcm = Yii::app()->gcm;
			$gcm->send($token, $message, array('extra' => 'one device', 'title'=>$title, 'value' => $content, 'info_type_id'=>$info_type_id, 'id'=>$id), array( 'delayWhileIdle' => true ));
	}
	
	/**
	 * Push notification to many devices
	 * @param array $tokens device's token
	 * @param string $content the content of message to push to devices
	 */
	public static function actionPushMultiDevice($tokens= array(), $title='', $content='', $info_type_id=1, $id=1) {
		$message = 'testing';
		$gcm = Yii::app()->gcm;
		$tokens = array_unique($tokens);
		$gcm->sendMulti($tokens, $message, array('extra' => 'multi devices ', 'title'=>$title, 'value' => $content, 'info_type_id'=>$info_type_id, 'id'=>$id), array( 'delayWhileIdle' => true ));
	}
}
?>
