<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Appointment'=>array('appointment'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Appointment', 'url'=>array('appointmentcreate')),
			array('label'=>'View Appointment', 'url'=>array('appointmentview', 'id'=>$model->id)),
			array('label'=>'Delete Appointment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Appointment', 'url'=>array('appointment')),
			array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),
	);
?>

<center><h4>Update Appointment <?php echo $model->id; ?></h4></center>

<?php $this->renderPartial('appointment_form', array('model'=>$model)); ?>