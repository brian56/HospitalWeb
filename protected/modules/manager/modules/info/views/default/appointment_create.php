<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Manager'=>array("/manager"),
	'Appointment'=>array('appointment'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Appointments', 'url'=>array('appointment')),
	array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),
);
?>

<center><h3>Create Appointment</h3></center>

<?php $this->renderPartial('appointment_form', array('model'=>$model)); ?>