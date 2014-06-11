<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Appointment'=>array('appointment'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Appointments', 'url'=>array('appointment')),
	array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),
);
?>

<center><h4>Create Appointment</h4></center>

<?php $this->renderPartial('appointment_form', array('model'=>$model)); ?>