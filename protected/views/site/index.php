<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<center>
	<h3>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h3>

	<p>This page is for managing hospital's data.</p>
	
	<?php echo CHtml::button('Push Notification', array('submit' => array('/site/pushnotification'))); ?>
	
</center>