<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Appointment')=>array('appointment'),
	$model->title=>array('appointmentView','id'=>$model->id),
	Yii::t('strings','Update'),
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Appointment'), 'url'=>array('appointmentcreate')),
			array('label'=>Yii::t('strings','View Appointment'), 'url'=>array('appointmentview', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Appointment'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'appointment'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Appointment'), 'url'=>array('appointment')),
			array('label'=>Yii::t('strings','Tracking new Appointment'), 'url'=>array('trackingAppointment')),
	);
?>

<center><h3><?php echo Yii::t('strings','Update Appointment').' #'; echo $model->id; ?></h3></center>

<?php $this->renderPartial('appointment_formUpdate', array('model'=>$model)); ?>