<?php
/* @var $this DeviceOsController */
/* @var $model DeviceOs */

$this->breadcrumbs=array(
	'Device Oses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DeviceOs', 'url'=>array('index')),
	array('label'=>'Manage DeviceOs', 'url'=>array('admin')),
);
?>

<h1>Create DeviceOs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>