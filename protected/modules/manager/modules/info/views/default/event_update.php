<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Event'=>array('event'),
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

<center><h3>Update Event <?php echo $model->id; ?></h3></center>

<?php $this->renderPartial('event_formUpdate', array('model'=>$model)); ?>