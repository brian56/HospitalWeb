<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Event'=>array('event'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Events', 'url'=>array('event')),
);
?>

<center><h3>Create Event</h3></center>

<?php $this->renderPartial('event_form', array('model'=>$model)); ?>