<?php
/* @var $this DeviceOsController */
/* @var $model DeviceOs */

$this->breadcrumbs=array(
	'Device Oses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DeviceOs', 'url'=>array('index')),
	array('label'=>'Create DeviceOs', 'url'=>array('create')),
	array('label'=>'View DeviceOs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DeviceOs', 'url'=>array('admin')),
);
?>

<h1>Update DeviceOs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>