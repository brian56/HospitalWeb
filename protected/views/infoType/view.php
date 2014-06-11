<?php
/* @var $this InfoTypeController */
/* @var $model InfoType */

$this->breadcrumbs=array(
	'Info Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List InfoType', 'url'=>array('index')),
	array('label'=>'Create InfoType', 'url'=>array('create')),
	array('label'=>'Update InfoType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InfoType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InfoType', 'url'=>array('admin')),
);
?>

<h1>View InfoType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'name_en',
	),
)); ?>
