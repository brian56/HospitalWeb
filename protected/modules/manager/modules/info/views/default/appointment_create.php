<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 	'Manager'=>array("/manager"),
	Yii::t('strings','Appointment')=>array('appointment'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Manage Appointment'), 'url'=>array('appointment')),
	array('label'=>Yii::t('strings','Tracking new Appointment'), 'url'=>array('trackingAppointment')),
);
?>

<center><h3><?php echo Yii::t('strings','Create Appointment')?></h3></center>

<?php $this->renderPartial('appointment_form', array('info'=>$info,'user'=>$user)); ?>