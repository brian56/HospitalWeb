<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Question'=>array('event'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Event', 'url'=>array('eventcreate')),
			array('label'=>'View Event', 'url'=>array('eventview', 'id'=>$model->id)),
			array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Event', 'url'=>array('event')),
	);
?>

<center><h4>Update Question <?php echo $model->id; ?></h4></center>

<?php $this->renderPartial('event_form', array('model'=>$model)); ?>