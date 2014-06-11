<?php
/* @var $this ChangeLogController */
/* @var $model ChangeLog */

$this->breadcrumbs=array(
	'Change Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChangeLog', 'url'=>array('index')),
	array('label'=>'Create ChangeLog', 'url'=>array('create')),
	array('label'=>'Update ChangeLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChangeLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChangeLog', 'url'=>array('admin')),
);
?>

<h1>View ChangeLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hospital_id',
		'user_id',
		'table_name',
		'change_type',
		'description',
		'date_create',
	),
)); ?>
