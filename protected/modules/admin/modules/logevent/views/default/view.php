<?php
/* @var $this LogEventController */
/* @var $model LogEvent */

$this->breadcrumbs=array(
	'Log Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LogEvent', 'url'=>array('index')),
	array('label'=>'Create LogEvent', 'url'=>array('create')),
	array('label'=>'Update LogEvent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LogEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogEvent', 'url'=>array('admin')),
);
?>

<h1>View LogEvent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'event_id',
		'date_create',
	),
)); ?>
