<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Event'=>array('event'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Events', 'url'=>array('event')),
);
?>

<center><h4>Create Event</h4></center>

<?php $this->renderPartial('event_form', array('model'=>$model)); ?>