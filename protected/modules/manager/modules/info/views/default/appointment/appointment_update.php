<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Appointment'=>array('appointment'),
	$model->title=>array('appointmentView','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Appointment', 'url'=>array('appointmentcreate')),
			array('label'=>'View Appointment', 'url'=>array('appointmentview', 'id'=>$model->id)),
			array('label'=>'Delete Appointment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'appointment'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Appointment', 'url'=>array('appointment')),
			array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),
	);
?>

<center><h3>Update Appointment <?php echo $model->id; ?></h3></center>

<?php $this->renderPartial('\appointment\appointment_formUpdate', array('model'=>$model)); ?>